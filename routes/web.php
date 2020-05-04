<?php

use Illuminate\Support\Facades\Auth;

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
    if (Auth::check()) {
        return redirect('/outapp/home');        
    } else {
        return redirect('/login');
    }
});
Route::get('/outapp/home', function () {
    return view('outdoor.index');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/outapp/outdoor', 'OutdoorController@index')->name('outdoor');
    Route::get('/outapp/outdoor/edit/{id}', 'OutdoorController@edit');
    Route::post('/outapp/outdoor/update/{id}', 'OutdoorController@update')->name('updateOut');
    Route::post('/outapp/outdoor/store', 'OutdoorController@store')->name('storeOut');
    Route::get('/outapp/outdoor/create', 'OutdoorController@create')->name('createOut');
    Route::post('/outapp/outdoor/delete', 'OutdoorController@delete')->name('deleteOut');
});

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
