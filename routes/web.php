<?php

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


//this makes laravel use the vue router. Sends user back to the initial vue page where it was initiated and then let vue take over routing
Route::get('/{vue_capture?}', function () {
   return view('welcome');
})->where('vue_capture', '^(?!storage).*$');
