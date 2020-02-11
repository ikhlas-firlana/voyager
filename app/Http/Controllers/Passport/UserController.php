<?php

namespace App\Http\Controllers\Passport;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Validator;

/**
 * this controller will handle passport route
 * change from token into passport
 */
class UserController extends Controller
{
    public $successStatus = 200;
    public $unauthStatus = 401;
    public $badrequestStatus = 400;

    /**
     * 
     */
    public function login() {
        
        if (Auth::attempt([
            'email' => request('email'),
            'password' =>  request('password')
        ])) {
                $user = Auth::user();
                $success['token'] = $user->createToken('nApp')->accessToken;

                return response()->json(['success' => $success], $this->successStatus);
        }
        
        return response()->json(['error'=> 'Unauthorizad'], $this->unauthStatus);
    }

    /**
     * 
     */
    public function register(Request $request) {
        
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        // validate request
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], $this->unauthStatus);
        }

        $input = $request->all();
        // Check user exist
        if (User::where(['email' => $input['email']])->exists()) {
            return response()->json(['error' => 'Cannot Register'], $this->badrequestStatus);            
        }

        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);

        $success['token'] = $user->createToken('nApp')->accessToken;
        $success['name'] = $user->name;

        return response()->json(['success' => $success], $this->successStatus);
    }

    /**
     * 
     */
    public function details() {
        $user = Auth::user();
        return response()->json(['success' => $user], $this->successStatus);
    }
}
