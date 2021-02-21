<?php

namespace App\Http\Controllers\Back;
use App\Http\Controllers\Controller;

use App\Http\Requests\AddBrandRequest;
use App\Http\Requests\AddCategoryRequest;
use App\Models\Brand;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BrandController extends Controller
{

    // list records from database
    public function index(){

        $brands= Brand::all();
        return view('back.brand.index', compact('brands'));

    }

//    show create form

    public function create(){
        $brands= Brand::all();
        return view('back.brand.create', compact('brands'));

    }

//    save record in database

    public function store(AddBrandRequest $request)
    {
        try{
            Brand::create([
                'name'=> $request->name,
                'slug'=>Str::slug($request->name,'-'),
                'description'=> $request->description,
                'user_id' => auth()->id()

            ]);

            return redirect()->back()->with('success', 'Brand added successfully');
        } catch (\Exception $e){
            return redirect()->back()->with('warning','Error: '.$e->getCode())->withInput();
        }

    }

//    show update form
    public function edit($slug)
    {
        $brand = Brand::where('slug',$slug)->first();
        if(!$brand){
            abort(404);
        }

        return view('back.brand.update', compact('brand'));


    }

//    update record in database

    public function update(AddBrandRequest $request, $slug)
    {
        $brand= Brand::where('slug',$slug)->first();

        $brand->update([
            'name'=> $request->name,
            'slug'=>Str::slug($request->name,'-'),
            'description'=> $request->description,
            'user_id' => auth()->id()
        ]);
        $brand->save();

        return redirect()->back()->with('success','Brand updated successfully');



    }

//    delete record from database

    public function destroy($id)
    {

        $brand= Brand::find($id);
        $brand->delete();

        return redirect()->back()->with('success','Brand deleted successfully');

    }
}
