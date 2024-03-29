<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class donhang extends Model
{
    use HasFactory;
    protected $table ='donhangs';
    public static function addBill($username,$hoten,$diachi,$dienthoai,$email,$pttt,$thanhtien){
        return DB::table('donhangs')->insert([
            'username' => $username,
            'hoten' => $hoten,
            'diachi' => $diachi,
            'dienthoai' => $dienthoai,
            'email' => $email,
            'date' => date('Y-m-d'),
            'pttt' => $pttt,
            'thanhtien' => $thanhtien
        ]);
    }
    public static function lastId(){
        return DB::table('donhangs')->orderBy('madon','desc')->first();
    }
    public static function lastIdWithUser($username){
        return DB::table('donhangs')->where('username',$username)->orderBy('madon','desc')->first();
    }
    public static function updateStatus($id,$status){
        DB::table('donhangs')
              ->where('madon', $id)
              ->update(['trangthai' => $status]);
    }
    public static function findDH($id){
        return DB::select('SELECT * FROM donhangs WHERE username=? ORDER BY madon desc ',[$id]);    
    }
    public static function findByMaDon($id){
        return DB::select('SELECT * FROM donhangs WHERE madon=?',[$id]);    
    }
}
