<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;
use App\Category;
use App\SubCategory; 

class ProductController extends Controller
{
    public function addProductForm() {
        $cats = Category::all();
        $subCats = SubCategory::all(); 

        return view('add-products', compact('cats', 'subCats'));
    }

    public function addProduct(Request $req) {

        $product = new Product;
        
        $product->name = $req->name;
        $product->quantity = $req->quantity;
        $product->category_id = $req->category_id;
        $product->sub_category_id = $req->sub_category_id;
        $product->save();
    
        return redirect()->back()->with('success','Product Added Succesfully!');
        
    }

    public function allProducts() {

        $products = Product::with('category', 'sub_category')->get();
        
        return view("all-products", compact('products'));
    }
}
