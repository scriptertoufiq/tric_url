<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::prefix('v1')->group(base_path('routes/Api_v1.php'));
Route::prefix('v2')->group(base_path('routes/Api_v2.php'));
