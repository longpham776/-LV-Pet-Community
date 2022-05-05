<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class chitietdonhang extends Model
{
    use HasFactory;
    public static function getById($id){
        return DB::table('chitietdonhang')->where('madon',$id)->get();
    }
}
