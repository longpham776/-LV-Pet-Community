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
}
