<?php

use App\Http\Controllers\Dashboard\CampaignController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\DonationController;
use App\Http\Controllers\Dashboard\EventController;
use App\Http\Controllers\Dashboard\ServiceController;
use App\Http\Controllers\Dashboard\SliderController;
use App\Http\Controllers\Dashboard\StatisticController;
use App\Http\Controllers\Dashboard\TeamController;
use App\Http\Controllers\Dashboard\TestimonialController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

// رابط الـ Webhook "منطقة حرة"
Route::post('stripe/webhook', [PaymentController::class, 'handleWebhook'])
    ->name('stripe.webhook');

Route::prefix(LaravelLocalization::setLocale())->group(function () {


    // Route::get('/', function () {
    //     return view('welcome');
    // });
    // WebSite
    Route::name('front.')->group(function () {
        Route::get('/', [MainController::class, 'index'])->name('index');
        Route::get('/about', [MainController::class, 'about'])->name('about');
        Route::get('/services', [MainController::class, 'services'])->name('services');
        Route::get('/donations', [MainController::class, 'donations'])->name('donations');
        Route::get('/events', [MainController::class, 'events'])->name('events');
        Route::get('/features', [MainController::class, 'features'])->name('features');
        Route::get('/teams', [MainController::class, 'teams'])->name('teams');
        Route::get('/testimonials', [MainController::class, 'testimonials'])->name('testimonials');
        Route::get('/contact', [MainController::class, 'contact'])->name('contact');
        Route::post('/contact', [MainController::class, 'contact_data']);
        Route::get('/donate/{campaign}', [PaymentController::class, 'donate'])
            ->name('donate');
        Route::post('/donate', [PaymentController::class, 'donate_process'])
            ->name('donate_process');
        Route::get('/payment/success', [PaymentController::class, 'donate_success'])
            ->name('donate_success'); // هذا هو الرابط اللي استدعيناه في الكنترولر

        Route::get('/payment/cancel', [PaymentController::class, 'donate_cancel'])
            ->name('donate_cancel');
    });
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->middleware(['auth', 'verified'])->name('dashboard');


    //Dashboard
    Route::middleware(['auth', 'verified', 'admin'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::resource('sliders', SliderController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('campaigns', CampaignController::class);
        Route::get('campaigns/{campaign}/delete/{image}', [CampaignController::class, 'delete_image'])->name('delete_image');
        Route::resource('services', ServiceController::class);
        Route::resource('statistics', StatisticController::class);
        Route::resource('events', EventController::class);
        Route::resource('teams', TeamController::class);
        Route::resource('testimonials', TestimonialController::class);
        Route::get('messages', [DashboardController::class, 'messages'])
            ->name('messages');
        Route::delete('messages/{message}', [DashboardController::class, 'deleteMessage'])
            ->name('messages.delete');
        Route::get('subscriptions', [DashboardController::class, 'subscription'])
            ->name('subscriptions');
        Route::get('donors', [DonationController::class, 'donor'])
            ->name('donors');
        Route::get('donations', [DonationController::class, 'donation'])
            ->name('donations');
        Route::get('settings', [DashboardController::class, 'settings'])
            ->name('settings');
        Route::put('settings', [DashboardController::class, 'settings_update']);
    });
    require __DIR__ . '/auth.php';
});
