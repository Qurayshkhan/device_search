<?php

use App\Http\Controllers\DeviceController;
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


Route::get('/', [DeviceController::class, 'searchDevice'])->name('device.search_device');
Route::post('/', [DeviceController::class, 'deviceResults'])->name('device.device_results');
Route::get('device-detail/{uuid}', [DeviceController::class, 'deviceDetail'])->name('device.device_detail');
