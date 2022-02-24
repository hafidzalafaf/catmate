<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\EncyclopediaCategory;

class EncyclopediaCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('encyclopediaCategory.table');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('encyclopediaCategory.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>['required'],
        ]);
        $slug = Str::slug($request->name, '-');

        EncyclopediaCategory::create([
            'name'=>$request->name,
            'slug'=>$slug,
        ]);

        return redirect()->to(route('encyclopedia.category.table'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EncyclopediaCategory  $encyclopediaCategory
     * @return \Illuminate\Http\Response
     */
    public function show(EncyclopediaCategory $encyclopediaCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EncyclopediaCategory  $encyclopediaCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(EncyclopediaCategory $encyclopediaCategory)
    {
        $category = $encyclopediaCategory;
        return view('encyclopediaCategory.edit', ['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EncyclopediaCategory  $encyclopediaCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EncyclopediaCategory $encyclopediaCategory)
    {
        $request->validate([
            'name'=>['required'],
        ]);
        $slug = Str::slug($request->name, '-');

        $encyclopediaCategory->update([
            'name'=>$request->name,
            'slug'=>$slug,
        ]);

        return redirect()->to(route('encyclopedia.category.table'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EncyclopediaCategory  $encyclopediaCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(EncyclopediaCategory $encyclopediaCategory)
    {
        $encyclopediaCategory->delete();
        // return redirect()->to(route('encyclopedia.category.table'));
        return 'success';
    }
}
