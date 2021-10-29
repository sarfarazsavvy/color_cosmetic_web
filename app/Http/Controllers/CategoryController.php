<?php

namespace App\Http\Controllers;
use App\Category;
use App\SubCategory;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
   
    public function allCategories() {

        $categories = Category::all();
        return view('all-categories', compact('categories'));
    
    }

    public function addCategoryForm() {

        return view('add-categories');
    
    }

    public function addCategory(Request $req) {
        
        $category = new Category;
        $category->name = $req->name;
        $category->save();
    
        return redirect()->back()->with('success','Category Added Succesfully!');
    }

    public function deleteCategory(Request $req) {
        $category = new Category;
        $category->where('id', $req->id)->delete();
        return redirect()->back()->with('success','Category Deleted!');
    }
    
    public function allSubCategories() {

        $subCategories = SubCategory::with('category')->get();
        return view('all-sub-categories', compact('subCategories'));
    
    }

    public function addSubCategoryForm() {
        $categories = Category::all();
        return view('add-sub-categories', compact('categories'));
    }

    public function addSubCategory(Request $req) {
        
        $subCategory = new SubCategory;
        $subCategory->name = $req->name;
        $subCategory->category_id = $req->category_id;
        $subCategory->save();
    
        return redirect()->back()->with('success','Category Added Succesfully!');
    }
}


// allCategories = get all categories
// addCategoryForm = add category form
// addCategory = adds category in database