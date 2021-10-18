<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;
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
}
