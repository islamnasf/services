<?php

use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('auth.login');
// });
Route::middleware('guest')->group(function () {
Route::get('/', [AuthenticatedSessionController::class, 'create'])
                ->name('login');
            });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
//sevice
route::group(['prefix' => 'dashboard/service/'], function () {
    Route::get('show', [ServiceController::class, 'index'])->name('getServices');
    Route::post('store', [ServiceController::class, 'store'])->name('storeService');
    Route::post('delete/{service}', [ServiceController::class, 'delete'])->name('deleteService');
    Route::post('update/{service}', [ServiceController::class, 'update'])->name('updateService');
    Route::get('active/{service}', [ServiceController::class, 'toggle'])->name('activeService');
});

//country 
route::group(['prefix' => 'dashboard/country/'], function () {
    Route::get('show', [CountryController::class, 'index'])->name('getCountry');
    Route::post('store', [CountryController::class, 'store'])->name('storeCountry');
    Route::post('delete/{country}', [CountryController::class, 'delete'])->name('deleteCountry');
    Route::post('update/{country}', [CountryController::class, 'update'])->name('updateCountry');
});
//location 
route::group(['prefix' => 'dashboard/location/'], function () {
    Route::get('show', [LocationController::class, 'index'])->name('getLocation');
    Route::post('store', [LocationController::class, 'store'])->name('storeLocation');
    Route::post('delete/{location}', [LocationController::class, 'delete'])->name('deleteLocation');
    Route::post('update/{location}', [LocationController::class, 'update'])->name('updateLocation');
});


// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';