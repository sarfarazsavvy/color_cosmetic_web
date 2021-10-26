<?php

namespace App\Http\Controllers\API;

use DB;
use App\User;
use Illuminate\Http\Request;
use App\Category;
use App\InventoryLog;
use App\SubCategory;
use App\Product;
use App\Sale;
use App\StoreStock;

class SaleController extends BaseController
{
    
    public function create(Request $req){
        $product_id = $req->input('product_id');
        $qty = $req->input('qty');
        $date =$req->input('date');
        if(!$product_id || !$qty || !$date)
        {
            return $this->sendError("Params missing product_id,qty,date");
        }
        $product = Product::find($product_id);
        $store = auth()->user()->stores()->first();
        if(!$product)
        {
            return $this->sendError("Product does not exist");
        }
        if(!$store)
        {
            return $this->sendError("You are not associated with any store");
        }

        $store_stock = StoreStock::where('store_id',$store->id)->where('product_id',$product_id)->first();
        if(!$store_stock)
        {
            return $this->sendError("Product does not exist in stock!");
        }
        
        $store_stock->quantity = $store_stock->quantity - $qty;
        
        
        
        if($store_stock->save())
        {   //add inventory log
            $sale = new Sale;
            
            if(isset($date)){
                $sale->sale_date =$date->format('Y-m-d');
            }else{
                $sale->sale_date = now();                
            }
            $sale->store_id = $store->id;
            $sale->product_id = $product_id;
            $sale->quantity = $qty;
            $sale->user_id = auth()->id();
            $sale->save();
            return $this->sendResponse(['store_stock'=>$store_stock],'Inventory updated!');
        }
        return $this->sendError("Something went wrong!");
    }
}
