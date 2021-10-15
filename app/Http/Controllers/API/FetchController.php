<?php


namespace App\Http\Controllers\API;

use DB;
use App\User;
use Illuminate\Http\Request;
use App\Category;
use App\SubCategory;
use App\Product;
use App\Http\Controllers\Controller as Controller;


class FetchController extends Controller
{
    
    public function categories(){
        $categories = Category::all();
        return $this->sendResponse(['categories'=>$categories],'Categories fetched successfully');
    }

    public function sub_categories(Request $req){
        
        if($req->input('category_id'))
        {
            $category = $req->input('category_id');
            $sub_categories = SubCategory::where('category_id',$category)->get();
        }
        else{
            $sub_categories = SubCategory::all();
        }
        return $this->sendResponse(['sub_categories'=>$sub_categories],'Sub categories fetched successfully');
    }

    public function products(Request $req){

        if($req->input('category_id'))
        {
            $category = $req->input('category_id');
            $products = Product::where('category_id',$category)->get();
        }
        else if($req->input('sub_category_id'))
        {
            $category = $req->input('category_id');
            $products = Product::where('category_id',$category)->get();
        }
        else{
            $products = Product::all();
        }
        return $this->sendResponse(['products'=>$products],'Products fetched successfully');
    }
}
