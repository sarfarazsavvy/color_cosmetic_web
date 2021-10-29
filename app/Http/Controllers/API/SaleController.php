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
        // [
        //     ["product_id":3,"qty":10],
        //     ["product_id":4,"qty":20]
        // ]
        
        if(!$product_id || !$qty) {
            return $this->sendError("Params missing product_id,qty");
        }

        $product = Product::find($product_id);
        $store = auth()->user()->stores()->first();
        
        if(!$product) {
            return $this->sendError("Product does not exist");
        }
        if(!$store) {
            return $this->sendError("You are not associated with any store");
        }

        $store_stock = StoreStock::where('store_id',$store->id)->where('product_id',$product_id)->first();
        if(!$store_stock) {
            return $this->sendError("Product does not exist in stock!");
        }
        
        $store_stock->quantity = $store_stock->quantity - $qty;
        $price = $store_stock->price * $qty;
        
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
                $sale->price = $price; 
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
            // $beautyAdvisorSale = Sale::with('store', 'product', 'product.category')->where('user_id', $userId)->where('sale_date', $dt)->get();
            $beautyAdvisorSale = Sale::with('store', 'product', 'product.category')->where('user_id', $userId)->where('sale_date', $dt)->get(); 
            // dd($beautyAdvisorSale);
            
            foreach( $beautyAdvisorSale as $sale ) {
                $unitSold += $sale->quantity;
            }

            return $this->sendResponse(['beauty_sales'=>$beautyAdvisorSale, 'unit_sold'=> $unitSold],'Success!');
        }

        public function overal_sales() {
            $sales = Sale::whereMonth('sale_date', date('m'))->get();
            $totalUnit = 0;
            $totalSale = 0;
            foreach( $sales as $sale ) {
                $totalUnit += $sale->quantity;
                $totalSale += $sale->price;
            }

            return $this->sendResponse(['sales_in_unit'=> $totalUnit, 'sales_in_rupees'=>$totalSale] ,'Monthly CEO Data recieved succesfully!');
        }

        public function overal_category_wise_sale() {
            
            $sales = Sale::with('product','product.category')->get();

            $data = [];
            $total = 0;
            if(isset($sales)) {
                foreach( $sales as $sale ) {
                    $total += $sale->quantity;
                   array_push($data, [
                        'id' => $sale->id,
                        'sale_date'=>$sale->sale_date,
                        'price'=>$sale->price,
                        'quantity'=>$sale->quantity,
                        'category'=>$sale['product'][0]['category']['name'],
                    ]);
                    
                }
            }

            $dataCollection = collect($data);

            $_dataCollection = $dataCollection->groupBy('category')->map(function ($row) {
                return $row->sum('quantity');
            });;

            return $this->sendResponse(['all_sales' =>$_dataCollection,'totals' =>$total] ,'CEO! Category Wise Data Recieved!');
        }

}
