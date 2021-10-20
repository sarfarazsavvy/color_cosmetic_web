<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use City;

class CityController extends Controller
{
    // Route::get('/all-cities', 'CityController@cities');
// Route::get('/add-city-form', 'CityController@createCityForm');
// Route::post('/add-city', 'CityController@createCity');

    public function cities() {
        $allcities = City::all();
        return view('all-cities', compact('allCities'));
    }

    public function createCityForm() {
        return view('add-cities');
    }

    public function createCity(Request $req) {
        
        $city = new City;
        $city->fill($req->all());
        $city->save();

        // $city->name = $req->name;
        // $city->state = $req->state;

        // $city->save();

    }


}
