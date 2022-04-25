<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class loaisp extends Model
{
    use HasFactory;
    public static function getLoai(){
        return DB::select('SELECT * FROM loaisp ');
    }
}
