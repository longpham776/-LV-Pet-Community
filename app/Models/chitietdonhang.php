<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class chitietdonhang extends Model
{
    use HasFactory;
    protected $table = 'chitietdonhangs';
    public static function getById($id){
        return DB::table('chitietdonhangs')->where('madon',$id)->get();
    }
    public static function addOrder($masp,$tensp,$gia,$hinh,$soluong,$thanhtien,$madon){
        return DB::table('chitietdonhangs')->insert([
            'masp' => $masp,
            'tensp' => $tensp,
            'gia' => $gia,
            'hinh' => $hinh,
            'soluong' => $soluong,
            'thanhtien' => $thanhtien,
            'madon' => $madon,
        ]);
    }
}
