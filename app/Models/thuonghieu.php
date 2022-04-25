<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class thuonghieu extends Model
{
    use HasFactory;
    public static function getTH(){
        return DB::select('SELECT * FROM thuonghieu ');
    }
    public static function addHang($ten,$tt){
         return DB::select('INSERT INTO thuonghieu(tenth,trangthai) VALUES(?,?)',[$ten,$tt]);
    }
    public static function delete_Hang($m){
        return DB::select('DELETE FROM thuonghieu WHERE math=?',[$m]);
    }
}
