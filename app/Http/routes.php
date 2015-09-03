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

Route::get('/transparansi/{tipeDana?}', function ($tipeDana = "belanja") {
    return redirect()->route('transparansi')->withDana($tipeDana);
});

Route::get('/transparansi/{tipeDana?}/tipe/{type?}', function ($tipeDana = "belanja", $type = "area") {
    return redirect()->route('transparansi')->withDana($tipeDana)->withType($type);
});

Route::get('/dinas/{tipeDana?}/tipe/{type?}/id/{id?}', function ($tipeDana = "belanja", $type = "area", $id = null) {
    return redirect()->route('transparansi')->withDana($tipeDana)->withId($id)->withFilter("dinas")->withType($type);
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
    $lembagas = App\Lembaga::all();
    $tags = App\Tag::all();
    return view('monitor.new')->withLembagas($lembagas)->withTags($tags);
}]);

Route::post('/input', ['as' => 'data.store', 'uses' => 'AppController@store']);