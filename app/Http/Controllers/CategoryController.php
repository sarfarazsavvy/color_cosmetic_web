<?php

namespace App\Http\Controllers;
use App\Category;
use App\SubCategory;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function addCategory(Request $req) {
        
        $category = new Category;
        $category->name = $req->category_name;
        $category->save();
    
        return redirect()->back()->with('success','Category Added Succesfully!');
    }
    
    public function addSubCategory(Request $req) {
        
        $subCategory = new SubCategory;
        $subCategory->name = $req->name;
        $subCategory->category_id = $req->parent_category;
        $subCategory->save();
    
        return redirect()->back()->with('success','Category Added Succesfully!');
    }
}
