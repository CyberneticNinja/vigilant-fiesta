<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Traits\JWTTrait;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    use JWTTrait;
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if($validator->fails()) 
        {
            return response()->json($validator->getMessageBag(),400);
        }

        if(!User::where('email',$request->email)->first())
        {
            return response()->json(['user' => 'user not found'],400);
        }

        $user = User::where('email',$request->email)->first();

        if(!Hash::check($request->password,$user->password))
        {
            return response()->json(['password' => 'user cannot be not found with email and password'],400);
        }

        $token = $this->createToken($request->email);

        return response()->json($token,200);
    }
}
