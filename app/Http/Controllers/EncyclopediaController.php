<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Encyclopedia;
use Illuminate\Http\Request;
use App\Models\EncyclopediaCategory;
use Illuminate\Support\Facades\Storage;

class EncyclopediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('encyclopedia.table');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = EncyclopediaCategory::get();
        return view('encyclopedia.add',['categories'=>$category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // ddd($request);
        $request->validate([
            'category'=>['required'],
            'title'=>['required'],
            'image'=>['required','image','file','max:1024'],
            'text'=>['required'],
        ]);

        // ddd($request);

        $slug = Str::slug($request->title, '-');

        Encyclopedia::create([
            'encyclopedia_category_id'=>$request->category,
            'title'=>$request->title,
            'image'=>$request->file('image')->store('encyclopedia/thumbnail'),
            'text'=>$request->text,
            'slug'=>$slug,
        ]);

        return redirect()->to(route('encyclopedia.table'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Encyclopedia  $encyclopedia
     * @return \Illuminate\Http\Response
     */
    public function show(Encyclopedia $encyclopedia)
    {
        return redirect()->to(route('encyclopedia.table'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Encyclopedia  $encyclopedia
     * @return \Illuminate\Http\Response
     */
    public function edit(Encyclopedia $encyclopedia)
    {
        // $encyclopedia->load('category');
        $category = EncyclopediaCategory::get();
        return view('encyclopedia.edit',['encyclopedia'=>$encyclopedia, 'categories'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Encyclopedia  $encyclopedia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Encyclopedia $encyclopedia)
    {
        $request->validate([
            'category'=>['required'],
            'title'=>['required'],
            'image'=>['image','file','max:1024'],
            'text'=>['required'],
        ]);
        
        if ($request->file('image')) {
            Storage::disk('public')->delete($encyclopedia->image);
            $dataUpdate['image'] = $request->file('image')->store('encyclopedia/thumbnail');
        }

        $slug = Str::slug($request->title, '-');

        $dataUpdate['encyclopedia_category_id']=$request->category;
        $dataUpdate['title']=$request->title;
        $dataUpdate['text']=$request->text;
        $dataUpdate['slug']=$slug;

        $encyclopedia->update($dataUpdate);

        return redirect()->to(route('encyclopedia.table'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Encyclopedia  $encyclopedia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Encyclopedia $encyclopedia)
    {
        Storage::disk('public')->delete($encyclopedia->image);
        $encyclopedia->delete();

        return 'success';
        // return redirect()->to(route('encyclopedia.table'));
    }
}
