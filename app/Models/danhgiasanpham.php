<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class danhgiasanpham extends Model
{
    use HasFactory;
    public static function getRatingUser($username,$masp){
        return DB::table('danhgiasanphams')->where('username', $username)->where('masp',$masp)->get();
    }
    public static function getRatingSp($masp){
        return DB::table('danhgiasanphams')->where('masp', $masp)->get();
    }
    public static function rating($masp,$username,$rate){
        return DB::table('danhgiasanphams')->insert([
            'masp' => $masp,
            'username' => $username,
            'rate' => $rate
        ]);
    }
    public static function updateRating($username,$rate){
        return DB::table('danhgiasanphams')->where('username',$username)->update(['rate' => $rate]);
    }
}
