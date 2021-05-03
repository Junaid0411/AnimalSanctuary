<?php

use App\Http\Controllers\AdoptionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AnimalController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('display',' App\Http\Controllers\AnimalController@display')->name('display_account');
Route::resource('animals', AnimalController::class);
Route::resource('adoptions', AdoptionController::class);
Route::get('approvedView', [App\Http\Controllers\AdoptionController::class, 'approvedView'])->name('approvedView');
Route::get('myRequests', [App\Http\Controllers\AdoptionController::class, 'myRequests'])->name('myRequests');
Route::get('myAnimals', [App\Http\Controllers\AdoptionController::class, 'myAnimals'])->name('myAnimals');

