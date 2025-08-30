<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = category::all();
        return view('admin.product.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=> 'required',
            'image'=> 'required|image',
            'category_id'=>'required',
            'price'=>'required|numeric',
            'quantity'=>'required|numeric',
            'description'=>'required',
            'status'=>'required|boolean',
            'featured'=>'required|boolean',

            ]);
            $image = $request->image;
            if ($image) {
                $imageName = time() . '.' . $image->extension();
                $image->move('uploads/products/', $imageName);
                $data["image"] = $imageName;
            }

           product::create($data);
            return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product $product)
    {
        $categories = category::all();
        return view('admin.product.update', compact('categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, product $product)
    {
        $data = $request->validate([
            'name'=>'required',
            'category_id'=>'required',
            'price'=>'required|numeric',
            'quantity'=>'required|numeric',
            'description'=>'required',
            'status'=>'required',


            ]);

            $image = $request->image;
            if ($image) {
                $imageName = time() . '.' . $image->extension();
                $image->move('uploads/products/', $imageName);
                $product->image= $imageName;
            }

            $product->name = $request->name;
            $product->category_id = $request->category_id;
            $product->price = $request->price;
            $product->quantity = $request->quantity;
            $product->description = $request->description;
            $product->status = $request->status;
            $product->save();
            return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index');
    }
}
