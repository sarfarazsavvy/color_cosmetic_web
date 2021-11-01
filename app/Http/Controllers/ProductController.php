<?php

namespace App\Http\Controllers;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use App\Category;
use App\SubCategory;
use App\Sale;
use App\StoreStock;

class ProductController extends Controller
{
    public function addProductForm() {
        $cats = Category::all();
        $subCats = SubCategory::all(); 

        return view('add-products', compact('cats', 'subCats'));
    }

    public function addProduct(Request $req) {

        $product = new Product;
        
        $product->sku_code = $req->sku;
        $product->name = $req->name;
        $product->price = $req->price;
        $product->category_id = $req->category_id;
        $product->sub_category_id = $req->sub_category_id;
        $product->save();
    
        return redirect()->back()->with('success','Product Added Succesfully!');
        
    }

    public function allProducts() {
            
        $products = Product::with('category', 'sub_category')->get();
        
        return view("all-products", compact('products'));
    }

    public function pending_sales(){

        $pending_sales = Sale::with('store','store_stock','product','product.category','user')->
        where('status',0)->get();
        return view("all_pending_sales", compact('pending_sales'));
    }

    public function approved_sales(Request $request){

        $id = $request->post('product_id');
        $qty =$request->post('qty');
        $store_stock = StoreStock::where('product_id',$id)->first();
        if($qty > $store_stock->quantity){
            return redirect()->route('all_pending_sales')->with('success','Store Stock Quantity Not yet');
        }
//Sales
        $sales =Sale::where('product_id',$id)->where('status',0)->first();

        $sales->status = 1;
        $sales->save();

//Store Stock
        $store_stock->quantity = $store_stock->quantity - $qty;
        $store_stock->save();
        return response()->json(["success" => true, "id" => $id,"qty" => $qty]);

    }

}