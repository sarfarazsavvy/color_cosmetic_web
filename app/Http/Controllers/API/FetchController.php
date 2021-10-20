<?php

namespace App\Http\Controllers\API;

use DB;
use App\User;
use Illuminate\Http\Request;
use App\Category;
use App\SubCategory;
use App\StoreStock;
use App\Product;

class FetchController extends BaseController
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

        $store = auth()->user()->stores()->first();
        if(!$store)
        {
            return $this->sendError("You are not associated with any store");
        }
        if($req->input('category_id'))
        {
            $category = $req->input('category_id');
            $products = StoreStock::with('product')->
                        whereHas('product',function($p) use($category){
                            return $p->where('category_id',$category);
                        })->where('store_id',$store->id)->get();
        }

        else if($req->input('sub_category_id'))
        {
            $category = $req->input('sub_category_id');
            $products = StoreStock::with('product')->
                        whereHas('product',function($p) use($category){
                            return $p->where('sub_category_id',$category);
                        })->where('store_id',$store->id)->get();
        }
        else{
            $products = StoreStock::with('product')->where('store_id',$store->id)->get();
        }
        return $this->sendResponse(['products'=>$products],'Products fetched successfully');
    }
}
