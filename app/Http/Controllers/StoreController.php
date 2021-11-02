<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;
use App\Product;
use App\StoreStock;
use App\City;


// stores = list of stores
// createStoreForm = form for creating store
// createStore = link to store store in database


class StoreController extends Controller
{
    public function createStore(Request $req) {
        
        $store = new Store();
        $store->name = $req->name;
        $store->contact = $req->contact;
        $store->address = $req->address;
        $store->city_id = $req->city;

        $store->save();

        return redirect()->back()->with('success','Store Created Succesfully!');
    }

    public function stores() {

        $cities = City::all();
        $stores = Store::all();
        return view('all-stores', compact('cities', 'stores'));
    }

    public function createStoreForm() {
        
        $cities = City::all();
        return view('create-store', compact('cities'));

    }

    public function storeStock($id) {  
        $products = Product::all();
        $stores = Store::all();
        $cities = City::all();
        $store = Store::where('id', $id)->first();
        $storeStocks = StoreStock::where('store_id',$id)->get();
        return view('store-stock', compact('products', 'stores', 'storeStocks', 'id', 'store', 'cities'));
    }

    public function updateStore(Request $req) {
        $id = $req->id;
        $name = $req->name;
        $address = $req->address;
        $city = $req->city;
        $contact = $req->contact;

        $store = new Store();
        $store->where('id', $id)->update(['name' => $name, 'address' => $address, 'city_id' => $city, 'contact' => $contact]);

        return redirect()->back()->with('success','Store Updated!');
    }

    public function updateStoreStock(Request $req) {
        
        $storeStock = new StoreStock;
        
        $id = $req->id;
        $price = $req->price;
        $discount = $req->discount;

        $storeStock->where('id',$id)->update(['price'=> $price, 'discount' => $discount]);
        return redirect()->back()->with('success','Stock Updated');

        // StoreStock::where('id',$id)->update(['price'=>'Updated title']);
    }

    public function AddProductsToStore(Request $req) {
        
        $existing_stock = StoreStock::where('store_id', $req->store_id)->where('product_id',$req->product_id)->first();
        
        if($existing_stock)
        
        {
            $existing_stock->quantity = $existing_stock->quantity + $req->quantity;
            $existing_stock->save();
            return redirect()->back()->with('success','Product updated Succesfully!');
        } else {
            $product = Product::find($req->product_id);
            $storeStock = new StoreStock;
            $storeStock->store_id = $req->store_id;
            $storeStock->product_id = $req->product_id;
            $storeStock->price = $product->price; //from proddutc
            $storeStock->quantity = $req->quantity;
            $storeStock->save();
            return redirect()->back()->with('success','Product Added Succesfully!');
        }

    }
}
