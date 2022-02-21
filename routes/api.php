<?php

use App\Http\Controllers\APIController;
use App\Http\Controllers\GeneralUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('get-district',[APIController::class, 'getDistrict'])->name('get.district');
Route::get('get-upazila',[APIController::class, 'getUpazila'])->name('get.upazila');
Route::get('get-general-users',[GeneralUserController::class, 'index'])->name('get.general.users');
Route::post('get-general-users',[GeneralUserController::class, 'store'])->name('get.general.users');

Route::post('/general-user-edit/{id}', [GeneralUserController::class, 'update'])->name('general.user.edit');
