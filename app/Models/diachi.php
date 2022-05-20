<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class diachi extends Model
{
    use HasFactory;
    public static function addAddress($u,$sdt,$dc){
        return DB::select('INSERT INTO diachi(username,sdt,diachi) VALUES (?,?,?)',[$u,$sdt,$dc]);
    }
    public static function findAddress($u){
        return DB::table('diachi')->where('username',$u)->get();
    }
}
