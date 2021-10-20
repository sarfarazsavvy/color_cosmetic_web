<?php

namespace App\Http\Controllers;

use App\Store;
use App\BeautyAdvisor;
use App\User;
use DB;
use App\UserStore;
use App\Appointment;

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

    public function AssignStoreToBeautyAdvisorForm() {
        $baGirls = User::where('role', 'ba')->get();
        $stores = Store::all();

        return view('beauty-advisor-store', compact('baGirls', 'stores'));

    }

    public function AssignStoreToBeautyAdvisor(Request $req) {
        
        $userId = $req->user_id;
        $storeId = $req->store_id;
        
        $userStore = new UserStore;
        $baGirlStore = UserStore::where('user_id', $userId)->first();
        $appointment = new Appointment;

        if(!$baGirlStore == null) {
           
            DB::table('user_stores')
              ->where('id', $baGirlStore->id)
              ->update(['store_id' => $storeId]);
        } else {

            $userStore->user_id = $req->user_id;
            $userStore->store_id = $req->store_id;
            $userStore->save();
        }

        $appointment->user_id = $userId;
        $appointment->store_id = $storeId;
        $appointment->appointed_at = now();

        $appointment->save();

    }

}