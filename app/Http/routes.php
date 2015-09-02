<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return redirect()->route('transparansi');
});

Route::get('/monitor', ['as' => 'monitor', function () {
    return view('layout.index');
}]);

Route::get('/transparansi', [
    'as' => 'transparansi', 'uses' => 'AppController@index'
]);

Route::get('/dinas/{type?}', function ($type = "area") {
    return redirect()->route('transparansi')->withFilter("dinas")->withType($type);
});

Route::get('/kecamatan/{type?}', function ($type = "area") {
    return redirect()->route('transparansi')->withFilter("kecamatan")->withType($type);
});

Route::get('/bumd/{type?}', function ($type = "area") {
    return redirect()->route('transparansi')->withFilter("bumd")->withType($type);
});

Route::get('/other/{type?}', function ($type = "area") {
    return redirect()->route('transparansi')->withFilter("other")->withType($type);
});

Route::get('/input', ['as' => 'data.input', function () {
    return view('monitor.new');
}]);