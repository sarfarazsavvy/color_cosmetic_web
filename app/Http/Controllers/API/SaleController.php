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

        $product_id =[];
        $qty =[];
        $product_id = $req->input('product_id');
        $qty = $req->input('qty');
        $date =$req->input('date');

        $store = auth()->user()->stores()->first();

        if(!$product_id) {
            return $this->sendError("Product does not exist");
        }
        if(!$store) {
            return $this->sendError("You are not associated with any store");
        }

        if(!$product_id || !$qty) {
            return $this->sendError("Params missing product_id,qty");
        }
        $i = 0;
        $sale_date = '';
        if(isset($date)) {
            $sale_date = Carbon::parse($date)->format('Y-m-d 00:00:00');
        } else {
            $sale_date = Carbon::now()->format('Y-m-d H:i:s');
        }
        $todays_sale = Sale::whereDate('created_at',$sale_date)->where('store_id',$store->id)->first();
        foreach ($product_id as $index=>$pro){
            $store_stock = StoreStock::where('store_id',$store->id)->where('product_id',$pro)->first();
            if(!$store_stock) {
                return $this->sendError("Product does not exist in stock!");
            }
            $price = $store_stock->price * $qty[$index];
            $sale = new Sale;

            $sale->sale_date = $sale_date;
            $sale->store_id = $store->id;
            $sale->product_id = $pro;
            $sale->quantity = $qty[$index];
            $sale->price = $price;
            $sale->user_id = auth()->id();
            if(!$todays_sale)
            {
                $sale->status = 1;
            }
            else{
                $sale->status = 0;
            }
            $sale->save();


            if(!$todays_sale)
            {
                $store_stock->quantity = $store_stock->quantity - $qty[$index];
                $store_stock->save();
            }

        }
        return $this->sendResponse(['store_stock'=>$store_stock],'Inventory updated!');

        }

        
        public function beauty_advisor_summary(Request $req) {

            $user = auth()->user();
            $userId = $user->id;
            $unitSold = 0;
            $dt = Carbon::now()->format('Y-m-d');
            $beautyAdvisorSale = Sale::with('store','store_stock', 'product', 'product.category')->where('user_id', $userId)->where('sale_date', $dt)->get();

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
            });

            return $this->sendResponse(['all_sales' =>$_dataCollection,'totals' =>$total] ,'CEO! Category Wise Data Recieved!');
        }

        public function region_wise_sale() {



            // $categories = ProductCategory::with([
            //     'products'=>function($ps) use($auth_user){
            //         $ps->selectRaw("*, (SELECT sum(qty) FROM `sold_products` where `products`.`id` = `sold_products`.`product_id`) as product_qty_sum");
            //         $ps->whereHas('solds',function($solds) use($auth_user){
            //                 return $solds->whereHas('sale', function($q2) use($auth_user){
            //                     return $q2->whereHas('user',function($u) use($auth_user){
            //                         return $u->whereHas('parent_asm',function($u) use($auth_user){
            //                             return $u->where('email',$auth_user->email);
            //                         });
            //                     });
            //             });
            //         });
            //     }
            //     ])->whereHas('products.solds',function($solds) use($auth_user){  
            //         return $solds->whereHas('sale', function($q2) use($auth_user){
            //             return $q2->whereHas('user',function($u) use($auth_user){
            //                 return $u->whereHas('parent_asm',function($u) use($auth_user){
            //                     return $u->where('email',$auth_user->email);
            //                 });
            //             });
            //         });
            //     })
            //     ->get();
    
            $sales = Sale::with('product', 'store', 'product.category')->get();

            // $sindhSaleTotal = 0;
            // $punjabSaleTotal = 0;
            // $punjabSale = [];

            $totalUnitsSoldCategoryWise = [];
            $totalUnitsSoldRegionWise = [];
            $totalPriceOfUnitSoldCategoryWise = 0;
            $totalAllUnitsSoldRegionWise = [];
            $totalAllUnitsSoldInAllRegions = [];
            $totalPriceOfAllUnitsSoldAllRegions = [];
            $regionWiseUnitSale = [];
            
            if (isset( $sales)) {

                function return_sum($data) {
                    $sum = 0;

                    $sum += $data;
                    return $sum;
                }
 
                foreach( $sales as $sale ) {

                    $quantity = return_sum($sale->quantity);

                    array_push($totalUnitsSoldRegionWise, [
                        'id' => $sale->id,
                        'sale_date'=>$sale->sale_date,
                        'price'=>$sale->price,
                        'quantity'=> $sale->quantity,
                        'region'=>$sale['store'][0]['city']['state'],
                        'category'=>$sale['product'][0]['category']['name']
                    ]);

                    array_push($totalUnitsSoldCategoryWise, [
                        'id' => $sale->id,
                        'sale_date'=>$sale->sale_date,
                        'price'=>$sale->price,
                        'quantity'=> $sale->quantity,
                        'region'=>$sale['store'][0]['city']['state'],
                        'category'=>$sale['product'][0]['category']['name']
                    ]);
                }
            }

            $totalUnitsSoldCategoryWise = collect($totalUnitsSoldCategoryWise);
            $totalUnitsSoldRegionWise = collect($totalUnitsSoldRegionWise);

            // $_regionWiseUnitSaleCollection = $regionWiseUnitSaleCollection->groupBy('region')->map(function ($row) {
            //     return $row->sum('unit');
            // });
        
            $totalUnitsSoldRegionWise = $totalUnitsSoldRegionWise->groupBy('region');
            $totalUnitsSoldCategoryWise = $totalUnitsSoldCategoryWise->groupBy('category');

            // dd($regionWiseUnitSale);

            return $this->sendResponse(['region_wise_sale' =>$totalUnitsSoldRegionWise, 'category_wise_sale' => $totalUnitsSoldCategoryWise ], 'CEO! Region wise sale recieved!');
        }
}
