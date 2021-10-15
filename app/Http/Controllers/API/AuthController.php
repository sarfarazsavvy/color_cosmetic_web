<?php


namespace App\Http\Controllers\API;

use DB;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends BaseController
{
    
    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('MyApp')->plainTextToken; 
            $success['id'] =  $user->id;
            $success['active'] = $user->active;
            $success['name'] =  $user->name;
            $success['email'] =  $user->email;
            $success['role'] =  $user->role;

            return $this->sendResponse($success, 'User login successfully.');
        } 
        else{ 
            return $this->sendError('Credentials are mismatched.', ['error'=>'Unauthorised']);
        } 
    }
}
