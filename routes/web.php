<?php

use App\Http\Controllers\LocationController;
use App\Http\Controllers\RackController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeviceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [\App\Http\Controllers\HomeController::class, 'home_index'])->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',

])->group(function () {

    Route::get('/dashboard', [\App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');

    Route::get('/home', function () {
        return view('home');
    })->name('home');

    Route::get('/device', function () {
        return view('devices.index');
    })->name('device');
    Route::resource('device', DeviceController::class);
    
    Route::resource('user', UserController::class);

    Route::get('/brand', function () {
        return view('brands.index');
    })->name('brands');
    Route::resource('brand', \App\Http\Controllers\BrandController::class);

    Route::get('/site', function () {
        return view('sites.index');
    })->name('site');
    Route::resource('site', SiteController::class);

    Route::get('/type', function () {
        return view('types.index');
    })->name('type');
    Route::resource('type', TypeController::class);

    Route::get('/location', function () {
        return view('locations.index');
    })->name('location');
    Route::resource('location', LocationController::class);

    Route::get('/rack', function () {
        return view('racks.index');
    })->name('rack');
    Route::resource('rack', RackController::class);

    Route::get('export-devices-data', [DeviceController::class, 'exportDeviceData']);

});
