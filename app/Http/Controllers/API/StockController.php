<?php

namespace App\Http\Controllers\API;

use DB;
use App\User;
use Illuminate\Http\Request;
use App\Category;
use App\InventoryLog;
use App\SubCategory;
use App\Product;
use App\StoreStock;
use Carbon\Carbon;
class StockController extends BaseController
{
    
    public function addStock(Request $req){
        
       
        $product_id = $req->input('product_id');
        $qty = $req->input('qty');
        $date = $req->input('date');
        
        
        if(!$product_id || !$qty)
        {
            return $this->sendError("Params missing product_id,qty");
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
            $store_stock  = new StoreStock;
            $store_stock->store_id = $store->id;
            $store_stock->product_id = $product_id;
            $store_stock->price = $product->price;
            $store_stock->quantity = $qty;
        }
        else{
            $store_stock->quantity = $store_stock->quantity + $qty;
        }
        if($store_stock->save())
        {   //add inventory log
            $inventory_log = new InventoryLog;

            if(isset($date)) {
                $inventory_log->inventory_date = Carbon::parse($date)->format('Y-m-d 00:00:00');
            } else {
                $dt = Carbon::now()->format('Y-m-d H:i:s');
                $inventory_log->inventory_date = $dt;
            }

            $inventory_log->store_id = $store->id;
            $inventory_log->product_id = $product_id;
            $inventory_log->quantity = $qty;
            $inventory_log->user_id = auth()->id();
            $inventory_log->save();
            return $this->sendResponse(['store_stock'=>$store_stock],'Inventory updated!');
        }

        return $this->sendError("Something went wrong!");
    }
}
