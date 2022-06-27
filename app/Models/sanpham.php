<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class sanpham extends Model
{
    use HasFactory;
    public static function getById($masp){
        return DB::table('sanphams')->where('masp',$masp)->get();
    }
    public static function search($tensp){
        return DB::table('sanphams')->where('tensp','regexp',$tensp)->where('trangthai','regexp','0')->paginate(4);
    }
    public static function addProduct($m,$t,$mt,$c,$g,$th,$l,$h,$tt){
        return DB::select('INSERT INTO sanphams(masp,tensp,mota,congdung,gia,math,loaisp,hinh,trangthai) VALUES (?,?,?,?,?,?,?,?,?)',[$m,$t,$mt,$c,$g,$th,$l,$h,$tt]);
    }
    public static function deleteProduct($tt,$m){
        return DB::select('UPDATE sanphams SET trangthai=?
        WHERE sanphams.masp =?',
        [$tt,$m]);
    }
    public static function update_product($m,$t,$mt,$c,$g,$th,$l,$tt, $h){
        return DB::select('UPDATE sanphams SET masp=?, tensp=?, mota=?, congdung=?, gia=?, math=?, loaisp=?, hinh=?,  trangthai=?
                           WHERE sanphams.masp =?',
                           [$m,$t,$mt,$c,$g,$th,$l,$h,$tt ,$m]);
    }
}
?>