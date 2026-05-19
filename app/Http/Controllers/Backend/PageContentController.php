<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\PageContent;
use Illuminate\Http\Request;

class PageContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.page-content.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sections = config('custom.contents');
        $pages = Page::all();
        return view('dashboard.page-content.create', compact(['pages', 'sections']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'page_id' => 'required',
            'section' => 'required',
            'title' => 'nullable',
            'description' => 'nullable',
            'image' => 'nullable|image',

        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {

            $imagePath = $request->file('image')
                ->store('page-content', 'public');
        }

        PageContent::create([
            'page_id' => $request->page_id,
            'section' => $request->section,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,

        ]);

        return redirect()
            ->back()
            ->with('success', 'Page content added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
