<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;

class PaymentController extends Controller
{
    public function donate(Campaign $campaign)
    {
        return view('front.donate', compact('campaign'));
    }

    public function donate_process(Request $request)
    {
        // تحديد المبلغ
        $amount = $request->custom_amount ?: $request->fixed_amount;

        // إنشاء سجل الدفع مع رقم معاملة مؤقت لتفادي خطأ المايجريشن
        $payment = Payment::create([
            'campaign_id' => $request->campaign_id,
            'user_id' => $request->anonymous ? null : Auth::id(),
            'amount' => $amount,
            'payment_gateway' => $request->payment_gateway,
            'status' => 'processing',
            'transaction_number' => 'TEMP-' . Str::upper(Str::random(10)),
        ]);

        return match ($request->payment_gateway) {
            'stripe' => $this->payWithStripe($payment),
            // 'paypal' => $this->payWithPaypal($payment),
            default  => back()->with('error', 'Gateway not supported'),
        };
    }

    private function payWithStripe($payment)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $session = StripeSession::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => 'Donation for Campaign #' . $payment->campaign_id,
                    ],
                    'unit_amount' => $payment->amount * 100, // السنت
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'metadata' => [
                'donation_id' => $payment->id,
            ],
            // لاحظ استخدام route names اللي عندك في الـ web.php
            'success_url' => route('front.donate_success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('front.donate_cancel'),
        ]);

        return redirect()->away($session->url);
    }

    public function donate_success(Request $request)
    {
        $sessionId = $request->get('session_id');
        if (!$sessionId) abort(404);

        Stripe::setApiKey(config('services.stripe.secret'));
        $session = StripeSession::retrieve($sessionId);

        if ($session->payment_status !== 'paid') {
            return abort(403, 'Payment not completed');
        }

        $paymentId = $session->metadata->donation_id;
        $payment = Payment::findOrFail($paymentId);

        if ($payment->status !== 'completed') {
            $payment->update([
                'status' => 'completed',
                'transaction_number' => $session->payment_intent // الرقم الحقيقي من سترايب
            ]);
        }

        flash()->success('Donation Done Successfully');
        return redirect()->route('front.index'); // أو المكان اللي بدك اياه
    }

    public function handleWebhook(Request $request)
{
    $payload = $request->all();
    $event = $payload['type'];

    // إذا كانت العملية نجحت في سترايب
    if ($event == 'checkout.session.completed') {
        $session = $payload['data']['object'];
        
        // بنطلع الـ Payment ID اللي خزناه في الـ metadata وقت الدفع
        $paymentId = $session['metadata']['payment_id'] ?? null;

        if ($paymentId) {
            $payment = Payment::find($paymentId);
            if ($payment) {
                $payment->update([
                    'status' => 'completed',
                    'transaction_number' => $session['id']
                ]);
            }
        }
    }

    return response()->json(['status' => 'success']);
}
}
