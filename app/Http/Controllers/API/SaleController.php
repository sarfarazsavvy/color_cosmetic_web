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
        foreach ((array) $product_id as $index=>$pro){
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

            $reformated_data = [ [$totalSale], [$totalUnit] ];
            return $this->sendResponse($reformated_data ,'Monthly CEO Data recieved succesfully!');

            // return $this->sendResponse(['sales_in_unit'=> $totalUnit, 'sales_in_rupees'=>$totalSale] ,'Monthly CEO Data recieved succesfully!');
        }

        // ============= OVERALL CATEGORY WISE SALE =================

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
                        'category'=> isset($sale['product'][0]['category']['name']) ? $sale['product'][0]['category']['name'] : "-" ,
                    ]);

                }
            }

            
            /* [
                [10,12,15,11,48],
                [8,13,13,8,42],
                [18,25,28,19,90],
                [30508,63190,101973,16210,211881]
            ]

            */

            // tableTitle ['eyes', 'lips', 'face', 'nails', "total"];

            $dataCollection = collect($data);

            $_dataCollection = $dataCollection->groupBy('category')->map(function ($row) {
                return $row->sum('quantity');
            });

            $reformated_data = [ isset($_dataCollection['Eyes']) ? $_dataCollection['Eyes'] : 0, 
                                 isset($_dataCollection['Lips']) ? $_dataCollection['Lips'] : 0, 
                                 isset($_dataCollection['Face']) ? $_dataCollection['Face'] : 0, 
                                 isset($_dataCollection['Nails']) ? $_dataCollection['Nails'] : 0,  
                                 $total ];
            

            // return $this->sendResponse(['all_sales' =>$_dataCollection,'totals' =>$total] ,'CEO! Category Wise Data Recieved!');
            return $this->sendResponse($reformated_data ,'CEO! Category Wise Data Recieved!');

        }

        // ============= REGION WISE SALE =============

        public function region_wise_sale() {

            $sindhSales = Sale::with(['store', 'product'])
                ->whereHas('store',function($c){
                    return $c->whereHas('city',function($c){
                        return $c->wherestate('sindh');
                    });
                })->get();

            $punjabSales = Sale::with(['store', 'product'])
                ->whereHas('store',function($c){
                    return $c->whereHas('city',function($c){
                        return $c->wherestate('punjab');
                    });
                })->get();
            
            $sindhTotalUnits = 0;
            $sindhTotalPrice = 0;
            $sindhTotalUnitByCategory = 0;
            $sindhTotalPriceByCategory = 0;
            $sindhSale = [];

            $punjabTotalUnits = 0;
            $punjabTotalPrice = 0;
            $punjabTotalUnitByCategory = 0;
            $punjabTotalPriceByCategory = 0;
            $punjabSale = [];

            $totalUnits = 0;
            $totalPrice = 0;
            $totalUnitByCategory = [];
            $totalPriceByCategory = [];

            if(isset($sindhSales)) {
                foreach( $sindhSales as $sale ) {

                   $sindhTotalUnits += $sale->quantity;
                   $sindhTotalPrice += $sale->price;
                   
                   array_push($sindhSale, [
                        'id' => $sale->id,
                        'sale_date'=>$sale->sale_date,
                        'price'=>$sale->price,
                        'quantity'=>$sale->quantity,
                        'category'=>$sale['product'][0]['category']['name'],
                    ]);
                }
            }

            if(isset($punjabSales)) {
                foreach( $punjabSales as $sale ) {
                   $punjabTotalUnits += $sale->quantity;
                   $punjabTotalPrice += $sale->price;
                   array_push($punjabSale, [
                        'id' => $sale->id,
                        'sale_date'=>$sale->sale_date,
                        'price'=>$sale->price,
                        'quantity'=>$sale->quantity,
                        'category'=>$sale['product'][0]['category']['name'],
                    ]);
                }
            }

        
            $sindhSale = collect($sindhSale);

            $sindhTotalUnitByCategory = collect($sindhTotalUnitByCategory);
            $sindhTotalPriceByCategory = collect($sindhTotalPriceByCategory);

            $sindhTotalUnitByCategory = $sindhSale->groupBy('category')->map(function ($row) {
                return $row->sum('quantity');
            });
            
            $sindhTotalPriceByCategory = $sindhSale->groupBy('category')->map(function ($row) {
                return $row->sum('price');
            });

            // =====================================
            

            $punjabSale = collect($punjabSale);

            $punjabTotalUnitByCategory = collect($punjabTotalUnitByCategory);
            $punjabTotalPriceByCategory = collect($punjabTotalPriceByCategory);

            $punjabTotalUnitByCategory = $punjabSale->groupBy('category')->map(function ($row) {
                return $row->sum('quantity');
            });
            
            $punjabTotalPriceByCategory = $punjabSale->groupBy('category')->map(function ($row) {
                return $row->sum('price');
            });

            $totalUnits = $punjabTotalUnits + $sindhTotalUnits;
            $totalPrice = $punjabTotalPrice + $sindhTotalPrice; 

            $totalUnitByCategory = array();
            foreach (array_keys($sindhTotalUnitByCategory->toArray() + $punjabTotalUnitByCategory->toArray()) as $key) {
                $totalUnitByCategory[$key] = @($sindhTotalUnitByCategory[$key] + $punjabTotalUnitByCategory[$key]);
            }

            $totalPriceByCategory = array();
            foreach (array_keys($sindhTotalPriceByCategory->toArray() + $punjabTotalPriceByCategory->toArray()) as $key) {
                $totalPriceByCategory[$key] = @($sindhTotalPriceByCategory[$key] + $punjabTotalPriceByCategory[$key]);
            }

            //first row is sindh



            $final_array = [
                [isset($sindhTotalUnitByCategory['Eyes']) ? $sindhTotalUnitByCategory['Eyes'] : 0 , isset($sindhTotalUnitByCategory['Lips']) ? $sindhTotalUnitByCategory['Lips'] : 0 , isset($sindhTotalUnitByCategory['Face']) ? $sindhTotalUnitByCategory['Face'] : 0 , isset($sindhTotalUnitByCategory['Nail']) ? $sindhTotalUnitByCategory['Nail'] : 0, $sindhTotalUnits],
                [isset($punjabTotalUnitByCategory['Eyes']) ? $punjabTotalUnitByCategory['Eyes'] : 0 , isset($punjabTotalUnitByCategory['Lips']) ? $punjabTotalUnitByCategory['Lips'] : 0 , isset($punjabTotalUnitByCategory['Face']) ? $punjabTotalUnitByCategory['Face'] : 0 , isset($punjabTotalUnitByCategory['Nail']) ? $punjabTotalUnitByCategory['Nail'] : 0, $punjabTotalUnits ],
                [isset($totalPriceByCategory['Eyes']) ? $totalPriceByCategory['Eyes'] : 0, isset($totalPriceByCategory['Lips']) ? $totalPriceByCategory['Lips'] : 0, isset($totalPriceByCategory['Face']) ? $totalPriceByCategory['Face'] : 0, isset($totalPriceByCategory['Nails']) ? $totalPriceByCategory['Nails'] : 0, $totalPrice ],
                [isset($totalUnitByCategory['Eyes']) ? $totalUnitByCategory['Eyes'] : 0, isset($totalUnitByCategory['Lips']) ? $totalUnitByCategory['Lips'] : 0, isset($totalUnitByCategory['Face']) ? $totalUnitByCategory['Face'] : 0, isset($totalUnitByCategory['Nails']) ? $totalUnitByCategory['Nails'] : 0, $totalUnits]
            ];

            /* [
                [10,12,15,11,48],
                [8,13,13,8,42],
                [18,25,28,19,90],
                [30508,63190,101973,16210,211881]
            ]

            */
            //
            //
            
            // return $this->sendResponse(['sindh' => ['total_units' => $sindhTotalUnits, 'total_price' => $sindhTotalPrice, 'total_unit_by_category'=> $sindhTotalUnitByCategory, 'total_price_by_category' => $sindhTotalPriceByCategory ],
            //                             'punjab' => ['total_units' => $punjabTotalUnits, 'total_price' => $punjabTotalPrice, 'total_unit_by_category'=> $punjabTotalUnitByCategory, 'total_price_by_category' => $punjabTotalPriceByCategory],
            //                             'total' => ['units' => $totalUnits, 'price' => $totalPrice, 'total_price_by_category' => $totalPriceByCategory, 'total_unit_by_category' => $totalUnitByCategory]
            //                             ],'CEO! Region Wise Data Recieved!');

            return $this->sendResponse(['region_wise_summary' => $final_array], 'CEO! Region wise data recieved');

        }
}