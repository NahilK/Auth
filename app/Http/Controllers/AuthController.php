<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    //

    public function login(Request $request){
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $token=auth()->user()->createToken(uniqid());
            $user=Auth::user();
            $user->token=$token->plainTextToken;
            return response(['user'=>$user]);
        }
        return  response(['status'=>"fail"]);
    }

    public function currentUser(){
        return Auth::user();
    }
}
