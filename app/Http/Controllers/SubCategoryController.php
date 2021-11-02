<?php

namespace App\Http\Controllers;
use App\Category;
use App\SubCategory;

use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index() {
        $subCategories = SubCategory::get();
        return view('all-sub-categories', compact('subCategories'));
    }

    public function create() {
        $categories=Category::get();
        return view('add-sub-categories',compact('categories'));
    }

    public function store(Request $req) {

        $subCategory = new SubCategory;
        $subCategory->name = $req->name;
        $subCategory->category_id = $req->category_id;
        $subCategory->save();
        return redirect()->back()->with('success','Sub Category Added Successfully!');
    }


    public function edit($id)
    {
        $categories=Category::get();
        $subcategory = SubCategory::findOrFail($id);
        return view('edit_sub_categories', compact('subcategory','categories'));
    }

    public function update(Request $request, $id)
    {
        $subcategory = SubCategory::findOrFail($id);
        $subcategory->name = $request->name;
        $subcategory->category_id = $request->category_id;
        $subcategory->save();

        if($subcategory){
            request()->session()->flash('success',' Sub category successfully updated');
        }
        else{
            request()->session()->flash('error','Error, Please try again');
        }
        return redirect()->route('sub_category.index');
    }


    public function destroy($id)
    {
        $subcategory = SubCategory::find($id);
        if($subcategory){
            $status=$subcategory->delete();
            if($status){
                request()->session()->flash('success','Sub Categories successfully deleted');
            }
            else{
                request()->session()->flash('error','Error, Please try again');
            }
            return redirect()->route('sub_category.index');
        }
        else{
            request()->session()->flash('error','Sub Category not found');

        }
        return redirect()->back();
    }

    public function show(){

    }

}
