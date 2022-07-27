<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class admin extends Model
{
    use HasFactory;
    protected $table = 'quantri';
    public static function getAll(){
        $tk= DB::select('SELECT * FROM quantri  ');
        return $tk;
    }
    public static function getLogin($e){
        return DB::select('SELECT * FROM quantri WHERE email=?  ',[$e]);
    }
    public static function getByEmail($e){
        return DB::select('SELECT * FROM quantri WHERE email=?  ',[$e]);
    }
    public static function getByUser($u){
        return DB::select('SELECT * FROM quantri WHERE username=?  ',[$u]);
    }
    public static function addUser($u,$p,$n,$e, $h){
        return DB::select('INSERT INTO quantri(username,password, hoten,email, hinh) VALUES (?,?,?,?,?)',[$u,$p,$n,$e, $h]);
    }
    public static function getAdmin(){
       return  DB::select('SELECT * FROM quantri  WHERE quyen=2 OR quyen=4');
    }
    public static function addAdmin($u,$p,$n,$e,$h,$q){
        return DB::select('INSERT INTO quantri(username,password, hoten,email,hinh,quyen) VALUES (?,?,?,?,?,?)',[$u,$p,$n,$e,$h,$q]);
    }
    public static function delete_Ad($u){
        return DB::select('DELETE FROM quantri WHERE username=?',[$u]);
    }
    public static function update_Ad($u,$n,$e,$q,$h){
        return DB::select('UPDATE quantri SET username=?, hoten=?, email=?,hinh =?, quyen=?
                           WHERE quantri.username =?',
                           [$u,$n,$e,$h,$q,$u]);
    }
    public static function updateuser($user,$hoten, $email){
        DB::table('quantri')
              ->where('username', $user)
              ->update([
                'hoten' => $hoten,
                'email' =>$email
            ]);
    }
}
