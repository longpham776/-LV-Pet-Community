<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class loaisp extends Model
{
    use HasFactory;
    public static function getLoai(){
        return DB::select('SELECT * FROM loaisp ');
    }
    public static function addLoai($ten,$tt){
        return DB::select('INSERT INTO loaisp(tenloai,trangthai) VALUES(?,?)',[$ten,$tt]);
   }
   public static function delete_Loai($m){
       return DB::select('DELETE FROM loaisp WHERE maloai=?',[$m]);
   }
}
