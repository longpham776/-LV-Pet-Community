<?php
Route::group(['prefix'=>'admin','namespace'=>'App\Http\Controllers\backend'],function(){
    Route::get('/','DashboardController@index')->name('ad.home');
    Route::get('/index2','DashboardController@index2')->name('ad.index2');
    Route::get('/login','DashboardController@login')->name('ad.login');
    Route::post('/postlogin','DashboardController@postlogin')->name('ad.postlogin');
    Route::get('/logout','DashboardController@logout')->name('ad.logout');
    Route::get('/addsp','DashboardController@addsp')->name('ad.addsp');
    Route::post('/insert_pro','DashboardController@insert_pro')->name('ad.insert_pro');
    Route::get('/delete_pro','DashboardController@delete_pro')->name('ad.delete_pro');
    Route::get('/edit_pro','DashboardController@edit_pro')->name('ad.edit_pro');
    Route::post('/update_pro','DashboardController@update_pro')->name('ad.update_pro');
   
});

?>