<?php
Route::group(['prefix'=>'admin','namespace'=>'App\Http\Controllers\backend'],function(){
    Route::get('/','DashboardController@index')->name('ad.home');
    Route::get('/index2','DashboardController@index2')->name('ad.index2');
    Route::get('/login','DashboardController@login')->name('ad.login');
    Route::post('/postlogin','DashboardController@postlogin')->name('ad.postlogin');
    Route::get('/logout','DashboardController@logout')->name('ad.logout');
    Route::get('/addsp','DashboardController@addsp')->name('ad.addsp');
   
});

?>