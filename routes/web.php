<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('injection/ok', function (\App\HttpBinService $service) {
    throw new RuntimeException("STOP");
    return $service->ok();
});

Route::get('injection/timeout', function (\App\HttpBinService $service) {
    throw new RuntimeException("STOP");
    return $service->timeout();
});

Route::get('resolve/ok', function () {
    throw new RuntimeException("STOP");
    $service = \Illuminate\Support\Facades\App::make(\App\HttpBinService::class);
    return $service->ok();
});

Route::get('resolve/timeout', function () {
    throw new RuntimeException("STOP");
    $service = \Illuminate\Support\Facades\App::make(\App\HttpBinService::class);
    return $service->timeout();
});
