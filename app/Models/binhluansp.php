<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class binhluansp extends Model
{
    use HasFactory;
    public static function getCommentSp($masp){
        return DB::table('binhluansps')->where('masp',$masp)->get();
    }
    public static function commentSp($masp,$username,$mota,$datetime){
        return DB::table('binhluansps')->insert([
            'masp' => $masp,
            'username' => $username,
            'mota' => $mota,
            'create_at' => $datetime
        ]);
    }
}
