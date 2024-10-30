<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\Api\V1\UserResource;
use App\Services\Api\V1\RegisterService;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function register(RegisterRequest $request, RegisterService $registerService)
    {
        try {
            $user = new UserResource($registerService->store($request->validated()));
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 422);
        }
        return response()->json([
            'status' => 'success',
            'message' => "Registered Successfully",
            'user' => $user,
        ],200);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
