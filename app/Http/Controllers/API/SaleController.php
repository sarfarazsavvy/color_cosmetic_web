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
use Carbon\Carbon;
class SaleController extends BaseController
{

    
    public function create(Request $req){
        $product_id = $req->input('product_id');
        $qty = $req->input('qty');
        $date =$req->input('date');
        
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
            return $this->sendError("Product does not exist in stock!");
        }
        
        $store_stock->quantity = $store_stock->quantity - $qty;
        
        if($store_stock->save())
            {   //add inventory log
                $sale = new Sale;
                
                if(isset($date)) {
                    $sale->sale_date = Carbon::parse($date)->format('Y-m-d 00:00:00');
                } else {
                    $dt = Carbon::now()->format('Y-m-d H:i:s');
                    $sale->sale_date = $dt;
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
        
        public function beauty_advisor_summary(Request $req) {

            $user = auth()->user();
            $userId = $user->id;
            $unitSold = 0;
            $dt = Carbon::now()->format('Y-m-d');
            $beautyAdvisorSale = Sale::with('store', 'product', 'product.category')->where('user_id', $userId)->where('sale_date', $dt)->get();
            
            foreach( $beautyAdvisorSale as $sale ) {
                $unitSold += $sale->quantity;
            }

            // dd($beautyAdvisorSale);
            return $this->sendResponse(['beauty_sales'=>$beautyAdvisorSale, 'unit_sold'=> $unitSold],'Inventory updated!');
        }
}
