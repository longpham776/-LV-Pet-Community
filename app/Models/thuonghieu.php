<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class thuonghieu extends Model
{
    use HasFactory;
    public static function getTH(){
        return DB::select('SELECT * FROM thuonghieu where trangthai = 0 ');
    }
    public static function getDeTH(){
        return DB::select('SELECT * FROM thuonghieu where trangthai = 1 ');
    }
    public static function addHang($ten,$tt){
         return DB::select('INSERT INTO thuonghieu(tenth,trangthai) VALUES(?,?)',[$ten,$tt]);
    }
    public static function delete_Hang($m){
        return DB::select('update thuonghieu set trangthai = 1 WHERE math=?',[$m]);
    }
    public static function restore_Hang($m){
        return DB::select('update thuonghieu set trangthai = 0 WHERE math=?',[$m]);
    }
}
