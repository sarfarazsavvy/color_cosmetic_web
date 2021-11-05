<?php


namespace App\Http\Controllers\API;

use DB;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class AuthController extends BaseController
{

    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $success['token'] = $user->createToken('MyApp')->plainTextToken;
            $success['id'] = $user->id;
            $success['active'] = $user->active;
            $success['name'] = $user->name;
            $success['email'] = $user->email;
            $success['role'] = $user->role;

            return $this->sendResponse($success, 'User login successfully.');
        } else {
            return $this->sendError('Credentials are mismatched.', ['error' => 'Unauthorised']);
        }
    }

    public function forgot_password(Request $request)
    {
        $email = $request->input('email');
        $user = User::where('email', $email)->first();

        if (!$user) {
            return $this->sendError('Email does not exist!', []);
        }
        if (!empty($user->provider) && !empty($user->provider_id)) {
            return $this->sendError('Email is already registered with social account!', []);
        }
        try {
            $response = Password::sendResetLink(["email" => $email], function (Message $message) {
                $message->subject($this->getEmailSubject());
            });
            switch ($response) {
                case Password::RESET_LINK_SENT:
                    return $this->sendResponse([], trans($response));
                case Password::INVALID_USER:
                    return $this->sendError(trans($response), []);
            }
        } catch (\Swift_TransportException $ex) {

            return $this->sendResponse($ex, 'password reset request sent.');
        }
    }
}
