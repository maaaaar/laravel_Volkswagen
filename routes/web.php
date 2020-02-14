<?php

Route::get('/', function () {
    return view('index');
});

Route::get('/compactos', 'CocheController@indexCompactos')->name('compactos');
Route::get('/electricos', 'CocheController@indexElectricos')->name('electricos');
Route::get('/coche/create', 'CocheController@create');
Route::post('/coche/create', 'CocheController@store');
Route::delete('/coche/{nombre}', 'CocheController@delete');

?>