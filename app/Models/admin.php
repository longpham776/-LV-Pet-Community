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
    public static function getLogin($e,$p){
        return DB::select('SELECT * FROM quantri WHERE email=? AND password=? ',[$e,$p]);
    }
    public static function getByEmail($e){
        return DB::select('SELECT * FROM quantri WHERE email=?  ',[$e]);
    }
    public static function addUser($u,$p,$n,$e){
        return DB::select('INSERT INTO quantri(username,password, hoten,email) VALUES (?,?,?,?)',[$u,$p,$n,$e]);
    }
}
