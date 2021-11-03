<?php

namespace App\Http\Controllers;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use App\Category;
use App\SubCategory;
use App\Sale;
use App\StoreStock;
use Carbon\Carbon;

class ProductController extends Controller
{
    public function addProductForm() {
        $cats = Category::all();
        $subCats = SubCategory::all();
        
        $request->session()->flash('success', 'Record successfully added!');
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
        $cats = Category::all();
        $subCats = SubCategory::all(); 
        $products = Product::with('category', 'sub_category')->get();
        
        return view("all-products", compact('products', 'cats', 'subCats'));
    }

    public function edit($id)
    {
        $categories =Category::orderBy('id','desc')->get();
        $sub_categories =SubCategory::orderBy('id','desc')->get();
        $product=Product::find($id);
        if(!$product){
            request()->session()->flash('error','products not found');
        }
        return view('edit_product',compact('product','categories','sub_categories'));
    }

    public function update(Request $request, $id)
    {
        $product=Product::find($id);

        $product->sku_code =$request->get('sku');
        $product->name =$request->get('name');
        $product->price =$request->get('price');
        $product->category_id =$request->get('category_id');
        $product->sub_category_id =$request->get('sub_category_id');
        $product->save();

        return redirect()->route('product.index');
    }


    public function destroy($id)
    {
        $product=Product::find($id);
        if($product){
            $status=$product->delete();
            if($status){
                request()->session()->flash('success','Product successfully deleted');
            }
            else{
                request()->session()->flash('error','Error, Please try again');
            }
            return redirect()->route('product.index');
        }
        else{
            request()->session()->flash('error','Product not found');
            return redirect()->back();
        }
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



    public function ba_sales_reports(){
        $ba_user =User::where('role','ba')->get();
        return view("ba_sales_reports", compact('ba_user'));
    }

    public function ba_sales_view($id){

        $user =User::where('id',$id)->first();
        $daily = Sale::with('store','store_stock', 'product', 'product.category')->where('user_id',$id)->where('status',1)->where('sale_date', '>=',Carbon::today())->get();
        $weekly = Sale::with('store','store_stock', 'product', 'product.category')->where('user_id',$id)->where('status',1)->where('sale_date', '>=', Carbon::today()->subDays(7))->get();
        $monthly = Sale::with('store','store_stock', 'product', 'product.category')->where('user_id',$id)->where('status',1)->where('sale_date', '>=', Carbon::today()->subDays(30))->get();

        return view("ba_sales_reports_view",compact('user','daily','weekly','monthly'));
    }


}