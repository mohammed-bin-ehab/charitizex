<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $campaigns = Campaign::with('image')->latest()->paginate(env('PAGE_SIZE'));
        return view('dashboard.campaigns.index', compact('campaigns'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $campaign = new Campaign();
        $categories = Category::select('id', 'title')->get();
        return view('dashboard.campaigns.create', compact('campaign', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        // @dd($request->all());
        $request->validate([
            'title_en' => 'required',
            'title_ar' => 'required',
            'content_en' => 'required',
            'content_ar' => 'required',
            'goal' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'required',
        ]);

        $campaign = Campaign::create([
            'title' => [
                'en' => $request->title_en,
                'ar' => $request->title_ar,
            ],
            'content' => [
                'en' => $request->content_en,
                'ar' => $request->content_ar,
            ],
            'goal' => $request->goal,
            'status' => $request->status,
            'category_id' => $request->category_id,
        ]);

        $path = $request->file('image')->store('uploads/campaigns', 'custom');
        $campaign->image()->create([
            'path' => $path,
        ]);

        if ($request->has('gallery')) {
            foreach ($request->gallery as $img) {
                $path = $img->store('uploads/campaigns', 'custom');
                $campaign->gallery()->create([
                    'path' => $path,
                    'type' => 'gallery',
                ]);
            }
        }
        // @dd($campaign->status);
        flash()->success('Campaign Added Successfully ');

        return redirect()
            ->route('dashboard.campaigns.index');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Campaign $campaign)
    {
        $categories = Category::select('id', 'title')->get();
        return view('dashboard.campaigns.edit', compact('campaign', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Campaign $campaign)
    {
        $request->validate([
            'title_en' => 'required',
            'title_ar' => 'required',
            'content_en' => 'required',
            'content_ar' => 'required',
            'goal' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        $campaign->update([
            'title' => [
                'en' => $request->title_en,
                'ar' => $request->title_ar,
            ],
            'content' => [
                'en' => $request->content_en,
                'ar' => $request->content_ar,
            ],
            'goal' => $request->goal,
            'status' => $request->status,
            'category_id' => $request->category_id,
        ]);
        if ($request->hasFile('image')) {
            File::delete(public_path($campaign->image->path));
            $path = $request->file('image')->store('uploads/campaigns', 'custom');
            $campaign->image()->update([
                'path' => $path,
            ]);
        }

        if ($request->has('gallery')) {
            foreach ($request->gallery as $img) {
                File::delete(public_path($campaign->gallery->path));
                $path = $img->store('uploads/campaigns', 'custom');
                $campaign->gallery()->update([
                    'path' => $path,
                    'type' => 'gallery',
                ]);
            }
        }
        flash()->info('Campaign Updated Successfully ');

        return redirect()
            ->route('dashboard.campaigns.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Campaign $campaign)
    {
        File::delete(public_path($campaign->image->path));
        $campaign->image()->delete();
        $campaign->delete();

        flash()->warning('Campaign Deleted Successfully ');

        return redirect()
            ->route('dashboard.campaigns.index');
    }

    function delete_image(Campaign $campaign, Image $image)
    {
        File::delete(public_path($image->path));
        $image->delete();
        return [
            'status' => true,
            'messages' => 'Image deleted successfully'
        ];
    }
}
