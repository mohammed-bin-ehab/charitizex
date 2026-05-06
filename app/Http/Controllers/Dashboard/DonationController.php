<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Payment;

class DonationController extends Controller
{
    public function donor()
    {
        $donors = User::with('donations')->where('type', 'donor')->latest()->paginate(env('PAGE_SIZE'));
        return view('dashboard.donors', compact('donors'));
    }

    public function donation()
    {
        $donations = Payment::with(['donor', 'campaign'])->latest()->paginate(env('PAGE_SIZE'));
        return view('dashboard.donations', compact('donations'));
    }
}
