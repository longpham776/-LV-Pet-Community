<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class diachi extends Model
{
    use HasFactory;
    protected $table = 'diachi';
    public static function addAddress($u,$sdt,$dc){
        return DB::select('INSERT INTO diachi(username,sdt,diachi) VALUES (?,?,?)',[$u,$sdt,$dc]);
    }
    public static function findAddress($u){
        return DB::table('diachi')->where('username',$u)->get();
    }
    public static function changeAllStatus($username){
        return DB::table('diachi')
            ->where('username',$username)
            ->update([
                'trangthai' => 0
            ]);
    }
    public static function defaultAddress($phone){
        return DB::table('diachi')
            ->where('sdt',$phone)
            ->update([
                'trangthai' => 1
            ]);
    }
    public static function updateAddress($user,$phone, $diachi){
        DB::table('diachi')
              ->where('username', $user)
              ->where('trangthai',1)
              ->update([
                'sdt' => $phone,
                'diachi' =>$diachi
            ]);
    }
}
