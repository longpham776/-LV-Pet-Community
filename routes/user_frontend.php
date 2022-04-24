<?php
Route::group(['namespace'=>'App\Http\Controllers'],function(){
    Route::get('/','FrontendController@index')->name('home');
});
?>