<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Payment;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Statistic;
use Illuminate\Http\Request;

class MainController extends Controller
{
    function index()
    {
        $sliders = Slider::with('image')->latest()->take(3)->get();
        $services = Service::latest()->take(3)->get();
        $statistics = Statistic::latest()->take(4)->get();
        $campaigns = Campaign::with(['image', 'category', 'donations'])->latest()->take(3)->get();
        return view('front.index', compact('sliders', 'services', 'statistics', 'campaigns'));
    }

    public function about()
    {
        return view('front.about');
    }

    public function services()
    {
        return view('front.services');
    }

    public function donations()
    {
        return view('front.donations');
    }
    public function events()
    {
        return view('front.events');
    }

    public function features()
    {
        return view('front.features');
    }

    public function teams()
    {
        return view('front.teams');
    }

    public function testimonials()
    {
        return view('front.testimonials');
    }

    public function contact()
    {
        return view('front.contact');
    }
    public function contact_data(Request $request)
    {
        dd($request->all());
    }
}
