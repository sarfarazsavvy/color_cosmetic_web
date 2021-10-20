<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;

class CityController extends Controller
{
    // Route::get('/all-cities', 'CityController@cities');
// Route::get('/add-city-form', 'CityController@createCityForm');
// Route::post('/add-city', 'CityController@createCity');

    public function cities() {
        $allCities = City::all();
        return view('all-cities', compact('allCities'));
    }

    public function createCityForm() {
        return view('add-cities');
    }

    public function createCity(Request $req) {
        
        $city = new City;

        $city->name = $req->name;
        $city->state = $req->state;

        $city->save();
        return redirect()->route('city.index')->with('success','city added');

    }


}
