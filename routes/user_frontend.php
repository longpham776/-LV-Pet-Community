<?php
Route::group(['namespace'=>'App\Http\Controllers'],function(){
    Route::get('/','FrontendController@index')->name('home');
    Route::get('/tintuc','FrontendController@news')->name('news');
    Route::get('/ungho','FrontendController@donate')->name('donate');
    Route::get('/thongtin','FrontendController@about')->name('about');
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
    Route::get('/contact','FrontendController@contact')->name('contact');
    Route::post('/sendmail','FrontendController@sendmail')->name('sendmail');
    Route::post('/momo_payment','FrontendController@momo_payment')->name('momo_payment');
    Route::post('/vn_payment','FrontendController@vn_payment')->name('vn_payment');
    Route::get('/account','FrontendController@account')->name('account');
    Route::get('/chitietDH','FrontendController@chitietDH')->name('chitietDH');
    Route::get('/edit-account','FrontendController@editAccount')->name('edit-account');
    Route::post('/update-address','FrontendController@updateAddress')->name('update-address');
    Route::get('/locLoai/{id}','FrontendController@locLoai')->name('locLoai');
    Route::get('/locTH/{id}','FrontendController@locTH')->name('locTH');
    Route::get('/lang/{locale}', function ($locale) {
        if (! in_array($locale, ['en', 'vn'])) {
            abort(404);
        }
        session()->put('locale',$locale);
        return redirect()->back();
    });
}); 
?>