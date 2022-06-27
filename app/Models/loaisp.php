<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class loaisp extends Model
{
    use HasFactory;
    public static function getLoai(){
        return DB::select('SELECT * FROM loaisp where trangthai = 0 ');
    }
    public static function getDeLoai(){
        return DB::select('SELECT * FROM loaisp where trangthai = 1 ');
    }
    public static function addLoai($ten,$tt){
        return DB::select('INSERT INTO loaisp(tenloai,trangthai) VALUES(?,?)',[$ten,$tt]);
   }
   public static function delete_Loai($m){
       return DB::select('update loaisp set trangthai =1 WHERE maloai=?',[$m]);
   }
   public static function restore_Loai($m){
    return DB::select('update loaisp set trangthai =0 WHERE maloai=?',[$m]);
}
   
}
