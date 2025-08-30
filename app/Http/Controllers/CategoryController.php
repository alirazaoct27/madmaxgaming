<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = category::all();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('admin.category.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
        'name'=> 'required',
        'image'=>'required|image',
        'description'=>'required',
        'status'=>'required|boolean'

        ]);
        $image = $request->image;
        if ($image) {
            $imageName = time() . '.' . $image->extension();
            $image->move('uploads/categories/', $imageName);
            $data["image"] = $imageName;
        }

        category::create($data);
        return redirect()->route('admin.categories.index');
}

    /**
     * Display the specified resource.
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, category $category)
    {

        $data = $request->validate([
            'name'=> 'required',
            'description'=>'required',
            'status'=>'required|boolean'

            ]);

            $image = $request->image;
        if ($image) {
            $imageName = time() . '.' . $image->extension();
            $image->move('uploads/categories/', $imageName);
            $category->image = $imageName;
        }

            $category->name = $request->name;
            $category->description = $request->description;
            $category->status = $request->status;
            $category->save();
            return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index');
    }
}
