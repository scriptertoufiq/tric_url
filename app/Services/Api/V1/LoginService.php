<?php

namespace App\Services\Api\V1;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
    public function loggedIn($data){
//        return Auth::attempt(['email'=>$data->email,'password'=> $data->password]);

        if(!Auth::attempt(['email'=>$data->email,'password'=> $data->password]))
        {
           return ['success'=>0];
        }

        $user = User::where('email',$data->email)->first();
        $tokenResult = $user->createToken('Personal Login Access Token');
        $token = $tokenResult->plainTextToken;
        return ['success'=>1,'user'=>$user,'token'=>$token];
    }
}
