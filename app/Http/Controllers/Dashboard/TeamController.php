<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::latest()->paginate(env('PAGE_SIZE'));
        return view('dashboard.teams.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $team = new Team();
        return view('dashboard.teams.create', compact('team'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {

        /*
    title
position
facebook
instagram
x
linkedIn
youTube
*/
        $request->validate([
            'title_en' => 'required',
            'title_ar' => 'required',
            'position_en' => 'required',
            'position_ar' => 'required',
            'image' => 'required',

        ]);

        $path = $request->file('image')->store('uploads/teams', 'custom');

        $team = Team::create([
            'title' => [
                'en' => $request->title_en,
                'ar' => $request->title_ar,
            ],
            'position' => [
                'en' => $request->position_en,
                'ar' => $request->position_ar,
            ],
            'image' => $path,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'x' => $request->x,
            'linkedIn' => $request->linkedIn,
            'youTube' => $request->youTube,
        ]);
        flash()->success('Team Added Successfully ');

        return redirect()
            ->route('dashboard.teams.index');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        return view('dashboard.teams.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Team $team)
    {
        $request->validate([
            'title_en' => 'required',
            'title_ar' => 'required',
            'position_en' => 'required',
            'position_ar' => 'required',
        ]);

        $team->update([
            'title' => [
                'en' => $request->title_en,
                'ar' => $request->title_ar,
            ],
            'position' => [
                'en' => $request->position_en,
                'ar' => $request->position_ar,
            ],
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'x' => $request->x,
            'linkedIn' => $request->linkedIn,
            'youTube' => $request->youTube ?? '',
        ]);
        if ($request->hasFile('image')) {
            File::delete(public_path($team->image));
            $path = $request->file('image')->store('uploads/teams', 'custom');
            $team->update([
                'image' => $path ?? $team->image,
            ]);
        }

        //    if ($request->hasFile('image')) {
        //         File::delete(public_path($statistic->image));
        //         $path = $request->file('image')->store('uploads/statistics', 'custom');
        //         $statistic->update(['path' => $path]);
        //     }

        flash()->info('Team Updated Successfully ');

        return redirect()
            ->route('dashboard.teams.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        $team->delete();

        flash()->warning('Team Deleted Successfully ');

        return redirect()
            ->route('dashboard.teams.index');
    }
}
