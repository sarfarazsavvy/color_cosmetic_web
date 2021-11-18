<?php

namespace App\Http\Controllers;
use App\Store;
use App\Product;
use App\StoreStock;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function regenerate_products_lists(){
        
        //first delete all old stock, reset stock;
        $storestock = StoreStock::all();
        foreach($storestock as $s)
        {
            $s->delete();
        }

        //fetch all existing stores
        $stores = Store::all();
        //fetch all products
        $products = Product::all();
        //iterate through each store so that we can add peroducts in that store
        foreach($stores as $store)
        {   // iterate through each product to add it
            foreach($products as $product)
            {   // adding specific product stock to specific store with zero qty
                $storeStock = new StoreStock;
                $storeStock->store_id = $store->id;
                $storeStock->product_id = $product->id;
                $storeStock->price = $product->price; //from proddutc
                $storeStock->quantity = 0;
                $storeStock->save();

            }
        }
            

    }
}
