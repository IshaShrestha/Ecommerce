<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(){

        $products= Product::all();
        return view('back.product.index', compact('products'));

    }

    public function create(){
        $categories= Category::all();
        $brands= Brand::all();
        return view('back.product.create', compact('categories','brands'));
    }

    public function store(AddProductRequest $request){
//        dd($request);

        $category = Category::where('slug',$request->category)->first();

        $brand= Brand::where('slug', $request->brand)->first();

        Product::create([
            'name'=> $request->name,
            'slug'=>Str::slug($request->name,'-'),
            'description'=> $request->description,
            'category_id'=>$category->id,
            'brand_id'=>isset($request->brand)?$brand->id:null,
            'quantity'=>$request->quantity,
            'price'=>$request->price,
            'user_id' => auth()->id(),
        ]);

        return redirect()->back()->with('success', 'Product added successfully');


    }

    public function edit($slug){

        $product= Product::where('slug',$slug)->first();
        if(!$product){
            abort(404);
        }
        $category = Category::where('slug',$slug)->first();
        $brand= Brand::where('slug', $slug)->first();
        $categories = Category::all();
        $brands = Brand::all();
        return view('back.product.update', compact('product','categories','brands','category','brand'));
    }

    public function update(AddProductRequest $request, $slug){

        $product= Product::where('slug', $slug)->first();
        $category = Category::where('slug',$request->category)->first();

        $brand= Brand::where('slug', $request->brand)->first();

        $product->update([
            'name'=> $request->name,
            'slug'=>Str::slug($request->name,'-'),
            'description'=> $request->description,
            'category_id'=>$category->id,
            'brand_id'=>isset($request->brand)?$brand->id:null,
            'quantity'=>$request->quantity,
            'price'=>$request->price,

        ]);
        $product->save();
        return redirect()->back()->with('success','Product updated succesfully');

    }

    public function destroy(Request $request){

        $product= Product::where('slug', $request->slug)->first();
        $product->delete();

        return redirect()->back()->with('success','Product deleted');

    }
}
