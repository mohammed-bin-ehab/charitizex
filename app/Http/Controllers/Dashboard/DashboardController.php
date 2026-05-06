<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Slider;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\Subscription;
use Illuminate\Support\Facades\Request as FacadesRequest;

class DashboardController extends Controller
{
    // public function index()
    // {
    //     return view('dashboard');
    // }

    public function index()
    {
        $withImage = Slider::has('image')->count();
        $withoutImage = Slider::doesntHave('image')->count();

        return view('dashboard', compact('withImage', 'withoutImage'));
    }

    public function smallSliderChart()
    {
        $withImage = Slider::has('image')->count();
        $withoutImage = Slider::doesntHave('image')->count();

        return view('dashboard.index', compact('withImage', 'withoutImage'));
    }


    public function subscription()
    {
        $subscriptions = Subscription::latest()->paginate(env('PAGE_SIZE'));
        return view('dashboard.subscriptions', compact('subscriptions'));
    }

    public function messages()
    {
        $messages = Message::latest()->paginate(env('PAGE_SIZE'));
        return view('dashboard.messages', compact('messages'));
    }

    public function deleteMessage(Message $message)
    {
        $message->delete();
        flash()->warning('Message deleted successfully');
        return redirect()->route('dashboard.messages');
    }

    public function settings()
    {
        // $settings = Setting::pluck('value', 'key')->toArray();
        return view('dashboard.settings');
    }

    public function settings_update(Request $request)
    {
        // dd($request->all());
        $data = $request->except('_token', '_method', 'site_logo', 'about_image');
        if ($request->hasFile('site_logo')) {
            $data['site_logo'] = $request->file('site_logo')->store('uploads/settings', 'custom');
        }

        if ($request->hasFile('about_image')) {
            $data['about_image'] = $request->file('about_image')->store('uploads/settings', 'custom');
        }
        foreach ($data as $key => $value) {
            Setting::updateOrCreate(
                [
                    'key' => $key
                ],
                [
                    'value' => $value
                ]
            );
        }
        flash()->success('Settings added Successfully');
        return redirect()->back();
    }
}
