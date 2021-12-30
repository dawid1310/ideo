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
    return view('search');
});

Route::get('/search', [App\Http\Controllers\GitCommunicationController::class, 'search']);
Route::get('/user', [App\Http\Controllers\GitCommunicationController::class, 'showUser']);
Route::get('/repo', [App\Http\Controllers\GitCommunicationController::class, 'showRepo']);