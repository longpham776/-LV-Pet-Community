<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class admin extends Model
{
    use HasFactory;
    public static function getAll(){
        $tk= DB::select('SELECT * FROM quantri   ');
        return $tk;
    }
    public static function getLogin($e){
        return DB::select('SELECT * FROM quantri WHERE email=?  ',[$e]);
    }
    public static function getByEmail($e){
        return DB::select('SELECT * FROM quantri WHERE email=?  ',[$e]);
    }
    public static function addUser($u,$p,$n,$e){
        return DB::select('INSERT INTO quantri(username,password, hoten,email) VALUES (?,?,?,?)',[$u,$p,$n,$e]);
    }
    public static function getAdmin(){
       return  DB::select('SELECT * FROM quantri  WHERE quyen=2 OR quyen=3');
    }
    public static function addAdmin($u,$p,$n,$e,$q){
        return DB::select('INSERT INTO quantri(username,password, hoten,email,quyen) VALUES (?,?,?,?,?)',[$u,$p,$n,$e,$q]);
    }
    public static function delete_Ad($u){
        return DB::select('DELETE FROM quantri WHERE username=?',[$u]);
    }
    public static function update_Ad($u,$n,$e,$q){
        return DB::select('UPDATE quantri SET username=?, hoten=?, email=?, quyen=?
                           WHERE quantri.username =?',
                           [$u,$n,$e,$q,$u]);
    }
}
