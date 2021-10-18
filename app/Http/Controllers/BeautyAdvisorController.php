<?php

namespace App\Http\Controllers;
use App\Store;
use App\BeautyAdvisor;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class BeautyAdvisorController extends Controller
{   
    public function beautyAdvisors() {
        $baGirls = User::where('role', 'ba')->get();
        return view('all-ba-girls', compact('baGirls'));
    }
    
    public function createBeautyAdvisorForm() {

        $stores = Store::all();
        return view('ba', compact('stores'));
    
    }

    public function createBeautyAdvisor(Request $req) {
        $ba = new User();
        
        $ba->name = $req->name;
        $ba->email = $req->email;
        $ba->role = "ba";
        $ba->password = Hash::make($req->password);

        $ba->save();
        return redirect()->back();
    }

}
