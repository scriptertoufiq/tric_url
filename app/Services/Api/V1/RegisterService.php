<?php

namespace App\Services\Api\V1;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

class RegisterService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function store($data){
        return $user = User::create([
            'name' => $data->name,
            'email' => $data->email,
            'password' => Hash::make($data->password),
        ]);
    }
}
