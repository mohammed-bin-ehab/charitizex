<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::latest()->paginate(env('PAGE_SIZE'));
        return view('dashboard.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $event = new Event();
        return view('dashboard.events.create', compact('event'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $request->validate([
            'title_en' => 'required',
            'title_ar' => 'required',
            'content_en' => 'required',
            'content_ar' => 'required',
            'image' => 'required',
            // 'hour' => 'regex:/^([01]\d|2[0-3]):([0-5]\d)$/',
            'hour' => 'date_format:H:i',
            'date' => 'date',
            'location' => 'string|min:3|max:255',
        ]);

        $path = $request->file('image')->store('uploads/events', 'custom');

        $event = Event::create([
            'title' => [
                'en' => $request->title_en,
                'ar' => $request->title_ar,
            ],
            'content' => [
                'en' => $request->content_en,
                'ar' => $request->content_ar,
            ],
            'image' => $path,
            'hour' => $request->hour,
            'date' => $request->date,
            'location' => $request->location,
        ]);
        flash()->success('Event Added Successfully ');

        return redirect()
            ->route('dashboard.events.index');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return view('dashboard.events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title_en' => 'required',
            'title_ar' => 'required',
            'content_en' => 'required',
            'content_ar' => 'required',
        ]);

        $event->update([
            'title' => [
                'en' => $request->title_en,
                'ar' => $request->title_ar,
            ],
            'content' => [
                'en' => $request->content_en,
                'ar' => $request->content_ar,
            ],
            'hour' => $request->hour,
            'date' => $request->date,
            'location' => $request->location,
        ]);
        if ($request->hasFile('image')) {
            File::delete(public_path($event->image));
            $path = $request->file('image')->store('uploads/events', 'custom');
            $event->update([
                'image' => $path ?? $event->image,
            ]);
        }

        //    if ($request->hasFile('image')) {
        //         File::delete(public_path($statistic->image));
        //         $path = $request->file('image')->store('uploads/statistics', 'custom');
        //         $statistic->update(['path' => $path]);
        //     }

        flash()->info('Event Updated Successfully ');

        return redirect()
            ->route('dashboard.events.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();

        flash()->warning('Event Deleted Successfully ');

        return redirect()
            ->route('dashboard.events.index');
    }
}
