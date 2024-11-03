<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Services\Api\V1\LoginService;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(LoginRequest $request, LoginService $service){
        try {

            $res = $service->loggedIn($request);
            if ($res['success']==1) {
                return  response()->json([
                    'accessToken' => $service->loggedIn($request),
                    'token_type' => 'Bearer',
                    'success' => "Successfully logged in",
                ]);
            }else{
                return  response()->json(['error' => "Failed to log in. Email or password wrong",]);
            }
        }catch (\Exception $exception){
            return response()->json(['error' => $exception->getMessage()], 422);
        }
    }
}
