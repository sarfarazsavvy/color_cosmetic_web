<?php

namespace App\Http\Controllers;

use App\Store;
use App\BeautyAdvisor;
use App\User;
use App\SubCategory;
use DB;
use App\UserStore;
use App\Appointment;
use App\PasswordResets;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

//use Illuminate\Support\Facades\Password;

class BeautyAdvisorController extends Controller
{   
    public function beautyAdvisors() {
        $baGirls = User::with('stores')->where('role', 'ba')->get();
        // dd($baGirls);
        return view('all-ba-girls', compact('baGirls'));
    }
    
    public function createBeautyAdvisorForm() {

        $stores = Store::all();
        return view('ba', compact('stores'));
    
    }

    public function createBeautyAdvisor(Request $req) {

        $req->validate([
            'email' => 'unique:users|required',
        ]);

        $ba = new User();
        
        $ba->name = $req->name;
        $ba->email = $req->email;
        $ba->role = "ba";
        $ba->password = Hash::make($req->password);

        $ba->save();
        return redirect()->route('beauty-advisors')->with('success','Beauty Advisor Added Succesfully!');
    }

    public function AssignStoreToBeautyAdvisorForm() {
        $baGirls = User::where('role', 'ba')->get();
        $stores = Store::all();

        return view('beauty-advisor-store', compact('baGirls', 'stores'));

    }
     public function changePasswordRequestList() {
        
         $password =PasswordResets::with('user')->where('status', "1")->get();
         return view('reset_password', compact('password'));
     }

     public function password_update(Request $req){
         $password = PasswordResets::get();
         $update_password =User::where('email',$req->email)->first(); 
         $update_password->password = Hash::make($req->password);

         DB::table('password_resets')
            ->where('email',$req->email)
            ->delete();

        //  $changeStatus->status = 0;
        //  $changeStatus->save();
         
         $update_password->save();
         return view('reset_password',compact('password'));

        //  return redirect()->route('forgot.password')->with('success','Password Succesfully Changed!');

     }

    public function deactivateBa(Request $req) {

        $ba = User::where('id', $req->id)->where('role', 'ba')->first();
        $ba->active = $req->status;

        $ba->save();
        return redirect()->route('beauty-advisors');
    }

    public function AssignStoreToBeautyAdvisor(Request $req) {
        
        $userId = $req->user_id;
        $storeId = $req->store_id;
        
        $userStore = new UserStore;
        $baGirlStore = UserStore::where('user_id', $userId)->first();
        $appointment = new Appointment;

        if(!$baGirlStore == null) {
            DB::table('user_stores')->where('id', $baGirlStore->id)->update(['store_id' => $storeId]);
        } else {

            $userStore->user_id = $req->user_id;
            $userStore->store_id = $req->store_id;
            $userStore->save();
        }

        $appointment->user_id = $userId;
        $appointment->store_id = $storeId;
        $appointment->appointed_at = now();

        $appointment->save();

        return redirect()->route('beauty-advisors')->with('success','Store Assigned to Beauty Advisor');

    }

    public function destroy($id)
    {
        $subcategory = SubCategory::find($id);
        if($subcategory){
            $status=$subcategory->delete();
            if($status){
                request()->session()->flash('success','Sub Categories successfully deleted');
            }
            else{
                request()->session()->flash('error','Error, Please try again');
            }
            return redirect()->route('sub_category.index');
        }
        else{
            request()->session()->flash('error','Sub Category not found');

        }
        return redirect()->back();
    }


}
