<?php
Route::group(['prefix'=>'admin','namespace'=>'App\Http\Controllers\backend'],function(){
    Route::get('/','DashboardController@index')->name('ad.home');
});

?>