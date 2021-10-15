<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;
use App\City;

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

    public function store() {

        $cities = City::all();
        $stores = Store::all();

        return view('store', compact('cities', 'stores'));
    }
}
