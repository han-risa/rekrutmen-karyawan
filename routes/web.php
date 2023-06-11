<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KandidatController;
use App\Http\Controllers\SkorController;

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
Route::group(['middleware' => ['auth:sanctum', 'verified']], function() {
    Route::get('/dashboard', function () {
        return view('pages.dashboard');
    })->name('dashboard');
    Route::group(['prefix' => 'components', 'as' => 'components.'], function() {
        Route::get('/alert', function () {
            return view('admin.component.alert');
        })->name('alert');
        Route::get('/accordion', function () {
            return view('admin.component.accordion');
        })->name('accordion');
    });
    Route::group(['prefix' => 'pages', 'as' => 'pages.'], function() {
        Route::get('/kandidat', function () {
            return redirect('/kandidat');
        })->name('kandidat');
        Route::get('/skor', function () {
            return redirect('/skor');
        })->name('skor');
    });
    Route::resource('/skor', SkorController::class);
    Route::resource('/kandidat', KandidatController::class);
});

// Route::resource('/kandidat', KandidatController::class);
