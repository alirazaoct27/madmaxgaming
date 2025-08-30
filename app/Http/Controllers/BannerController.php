<?php

namespace App\Http\Controllers;

use App\Models\banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = banner::all();
       return view('admin.banners.index',compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('admin.banners.add');
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
                $image->move('uploads/banners/', $imageName);
                $data["image"] = $imageName;
            }

            banner::create($data);
            return redirect()->route('admin.banners.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(banner $banner)
    {
        return view('admin.banners.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, banner $banner)
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
                $image->move('uploads/banners/', $imageName);
                $banner->image = $imageName;
            }

            $banner->name = $request->name;
            $banner->description = $request->description;
            $banner->status = $request->status;
            $banner->save();
            return redirect()->route('admin.banners.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(banner $banner)
    {
        //
    }
}
