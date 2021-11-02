<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;

class CityController extends Controller
{

    public function create() {
        return view('add-cities');
    }


    public function index()
    {
        $city = City::get();
        return view('all-cities', compact('city'));
    }

    public function store(Request $request)
    {
        $city = new City;
        $city->name = $request->name;
        $city->state = $request->state;
        $city->save();

        return redirect()->route('city.index')->with('success','city added');
    }

    public function edit($id)
    {
        $city = City::findOrFail($id);
        return view('edit_city', compact('city'));
    }

    public function update(Request $request, $id)
    {
        $city = City::findOrFail($id);
        $city->name = $request->name;
        $city->state = $request->state;
        $city->save();

        if($city){
            request()->session()->flash('success','City successfully updated');
        }
        else{
            request()->session()->flash('error','Error, Please try again');
        }
        return redirect()->route('city.index');
    }
    public function destroy($id)
    {
        $city=City::find($id);
        if($city){
            $status=$city->delete();
            if($status){
                request()->session()->flash('success','City successfully deleted');
            }
            else{
                request()->session()->flash('error','Error, Please try again');
            }
            return redirect()->route('city.index');
        }
        else{
            request()->session()->flash('error','City not found');

        }
        return redirect()->back();
    }

        public function show(){

        }

}
