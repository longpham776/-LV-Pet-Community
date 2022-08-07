<?php
Route::group(['prefix'=>'admin','namespace'=>'App\Http\Controllers\backend'],function(){
    Route::get('/','DashboardController@index')->name('ad.home');
    Route::get('/thuonghieu','DashboardController@thuonghieu')->name('ad.thuonghieu');
    
    Route::post('/postlogin','DashboardController@postlogin')->name('ad.postlogin');
    Route::get('/logout','DashboardController@logout')->name('ad.logout');
    Route::get('/addsp','DashboardController@addsp')->name('ad.addsp');
    Route::post('/insert_pro','DashboardController@insert_pro')->name('ad.insert_pro');
    Route::get('/delete_pro','DashboardController@delete_pro')->name('ad.delete_pro');
    Route::get('/edit_pro','DashboardController@edit_pro')->name('ad.edit_pro');
    Route::post('/update_pro','DashboardController@update_pro')->name('ad.update_pro');
    Route::get('/addhang','DashboardController@addhang')->name('ad.addhang');
    Route::get('/delete_hang','DashboardController@delete_hang')->name('ad.delete_hang');
    Route::get('/loaisp','DashboardController@loaisp')->name('ad.loaisp');
    Route::get('/addloai','DashboardController@addloai')->name('ad.addloai');
    Route::get('/delete_loai','DashboardController@delete_loai')->name('ad.delete_loai');
    Route::get('/qlad','DashboardController@qlad')->name('ad.qlad');
    Route::get('/add_ad','DashboardController@add_ad')->name('ad.add_ad');
    Route::get('/delete_ad','DashboardController@delete_ad')->name('ad.delete_ad');
    Route::get('/edit_ad','DashboardController@edit_ad')->name('ad.edit_ad');
    Route::post('/insert_ad','DashboardController@insert_ad')->name('ad.insert_ad');
    Route::post('/update_ad','DashboardController@update_ad')->name('ad.update_ad');
    Route::get('/listdelete','DashboardController@listdelete')->name('ad.listdelete');
    Route::get('/remove_pro','DashboardController@remove_pro')->name('ad.remove_pro');
    Route::get('/donhang','DashboardController@donhang')->name('ad.donhang');
    Route::get('/chitietDH','DashboardController@chitietDH')->name('ad.chitietDH');
    Route::get('/Update-trangthaidon','DashboardController@Updatetrangthaidon')->name('ad.Update-trangthaidon');
    Route::get('/listDeLoai','DashboardController@ListDeLoai')->name('ad.listDeLoai');
    Route::get('/restoreLoai','DashboardController@RestoreLoai')->name('ad.restoreLoai');
    Route::get('/listDeTH','DashboardController@listDeTH')->name('ad.listDeTH');
    Route::get('/restoreTH','DashboardController@restoreTH')->name('ad.restore_hang');
    Route::get('/khachhang','DashboardController@khachhang')->name('ad.khachhang');
    Route::get('/resetPass','DashboardController@resetPass')->name('ad.resetPass');
    Route::get('/listBinhLuan','DashboardController@listBinhLuan')->name('ad.listBinhLuan');
    Route::get('/xoaBinhLuan','DashboardController@xoaBinhLuan')->name('ad.xoaBinhLuan');
    
   
});
Route::get('/login','App\Http\Controllers\backend\DashboardController@login')->name('ad.login');
?>