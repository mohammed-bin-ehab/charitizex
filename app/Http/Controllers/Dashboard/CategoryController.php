<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->paginate(env('PAGE_SIZE'));
        return view('dashboard.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = new Category();
        return view('dashboard.categories.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $request->validate([
            'title_en' => 'required',
            'title_ar' => 'required',
        ]);

        $category = Category::create([
            'title' => [
                'en' => $request->title_en,
                'ar' => $request->title_ar,
            ],
        ]);

        flash()->success('Category Added Successfully ');

        return redirect()
            ->route('dashboard.categories.index');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'title_en' => 'required',
            'title_ar' => 'required',
        ]);

        $category->update([
            'title' => [
                'en' => $request->title_en,
                'ar' => $request->title_ar,
            ],
        ]);

        flash()->info('Category Updated Successfully ');

        return redirect()
            ->route('dashboard.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        flash()->warning('Category Deleted Successfully ');

        return redirect()
            ->route('dashboard.categories.index');
    }
}
