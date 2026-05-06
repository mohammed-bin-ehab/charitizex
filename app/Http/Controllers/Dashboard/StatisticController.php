<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Statistic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class StatisticController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $statistics = Statistic::latest()->paginate(env('PAGE_SIZE'));
        return view('dashboard.statistics.index', compact('statistics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $statistic = new Statistic();
        return view('dashboard.statistics.create', compact('statistic'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        //         title
        //icon
        // number
        // icon
        $request->validate([
            'title_en' => 'required',
            'title_ar' => 'required',
            'number' => 'required',
            'icon' => 'required',
        ]);

        $path = $request->file('icon')->store('uploads/statistics', 'custom');

        $statistic = Statistic::create([
            'title' => [
                'en' => $request->title_en,
                'ar' => $request->title_ar,
            ],
            'number' => $request->number,
            'icon' => $path,
        ]);
        flash()->success('Statistic Added Successfully ');

        return redirect()
            ->route('dashboard.statistics.index');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Statistic $statistic)
    {
        return view('dashboard.statistics.edit', compact('statistic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Statistic $statistic)
    {
        $request->validate([
            'title_en' => 'required',
            'title_ar' => 'required',
            'number' => 'required',
        ]);

        $statistic->update([
            'title' => [
                'en' => $request->title_en,
                'ar' => $request->title_ar,
            ],
            'number' => $request->number,
        ]);
        if ($request->hasFile('icon')) {
            File::delete(public_path($statistic->icon));
            $path = $request->file('icon')->store('uploads/statistics', 'custom');
            $statistic->update([
                'icon' => $path ?? $statistic->icon,
            ]);
        }

        //    if ($request->hasFile('icon')) {
        //         File::delete(public_path($statistic->icon));
        //         $path = $request->file('icon')->store('uploads/statistics', 'custom');
        //         $statistic->update(['path' => $path]);
        //     }

        flash()->info('Statistic Updated Successfully ');

        return redirect()
            ->route('dashboard.statistics.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Statistic $statistic)
    {
        $statistic->delete();

        flash()->warning('Statistic Deleted Successfully ');

        return redirect()
            ->route('dashboard.statistics.index');
    }
}
