<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class sanphamyeuthich extends Model
{
    use HasFactory;
    protected $table ='sanphamyeuthich';
    public static function findByUserMasp($username,$masp){
        return DB::table('sanphamyeuthich')->where('username',$username)->where('masp',$masp)->get();
    }
    public static function addSpYeuthich($username,$masp,$tensp,$hinh){
        return DB::table('sanphamyeuthich')->insert([
            'username' => $username,
            'masp' => $masp,
            'tensp' => $tensp,
            'hinh' => $hinh
        ]);
    }
    public static function deteleStatus($username,$masp){
        DB::table('sanphamyeuthich')
              ->where('username', $username)
              ->where('masp',$masp)
              ->update([
                'trangthai' => 1
            ]);
    }
    public static function updateStatus($username,$masp){
        DB::table('sanphamyeuthich')
              ->where('username', $username)
              ->where('masp',$masp)
              ->update([
                'trangthai' => 0
            ]);
    }
}