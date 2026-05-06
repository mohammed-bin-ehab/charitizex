<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::latest()->paginate(env('PAGE_SIZE'));
        return view('dashboard.testimonials.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $testimonial = new Testimonial();
        return view('dashboard.testimonials.create', compact('testimonial'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {

        //     title
        // position
        // review
        // rate
        $request->validate([
            'title_en' => 'required',
            'title_ar' => 'required',
            'review' => 'required',
            'image' => 'required',
        ]);

        $path = $request->file('image')->store('uploads/testimonials', 'custom');

        $testimonial = Testimonial::create([
            'title' => [
                'en' => $request->title_en,
                'ar' => $request->title_ar,
            ],
            'image' => $path,
            'position' => $request->position,
            'review' => $request->review,
            'rate' => $request->rate,
        ]);
        flash()->success('Testimonial Added Successfully ');

        return redirect()
            ->route('dashboard.testimonials.index');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonial $testimonial)
    {
        return view('dashboard.testimonials.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'title_en' => 'required',
            'title_ar' => 'required',
            'review' => 'required',
        ]);

        $testimonial->update([
            'title' => [
                'en' => $request->title_en,
                'ar' => $request->title_ar,
            ],
            'position' => $request->position,
            'review' => $request->review,
            'rate' => $request->rate,
        ]);
        if ($request->hasFile('image')) {
            File::delete(public_path($testimonial->image));
            $path = $request->file('image')->store('uploads/testimonials', 'custom');
            $testimonial->update([
                'image' => $path ?? $testimonial->image,
            ]);
        }

        //    if ($request->hasFile('image')) {
        //         File::delete(public_path($statistic->image));
        //         $path = $request->file('image')->store('uploads/statistics', 'custom');
        //         $statistic->update(['path' => $path]);
        //     }

        flash()->info('Testimonial Updated Successfully ');

        return redirect()
            ->route('dashboard.testimonials.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();

        flash()->warning('Testimonial Deleted Successfully ');

        return redirect()
            ->route('dashboard.testimonials.index');
    }
}
