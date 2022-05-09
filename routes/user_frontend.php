<?php
Route::group(['namespace'=>'App\Http\Controllers'],function(){
    Route::get('/','FrontendController@index')->name('home');
    Route::get('/sanpham','FrontendController@sanpham')->name('sanpham');
    Route::get('/chitietsanpham/{id}','FrontendController@chitietsanpham')->name('chitietsanpham');
    Route::get('/giohang','FrontendController@giohang')->name('giohang');
    Route::get('/logout','FrontendController@logout')->name('logout');
    Route::get('/register','FrontendController@register')->name('register');
    Route::post('/postregister','FrontendController@postregister')->name('postregister');
    Route::post('/postcart','FrontendController@postcart')->name('postcart');
    Route::get('/delcart/{id}','FrontendController@delcart')->name('delcart');
    Route::get('/destroycart','FrontendController@destroycart')->name('destroycart');
    Route::get('/upcart/{id}/{qty}','FrontendController@upcart')->name('upcart');
    Route::get('/checkout','FrontendController@checkout')->name('checkout');
    Route::post('/postcheckout','FrontendController@postcheckout')->name('postcheckout');
});

?>