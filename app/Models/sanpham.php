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
        return DB::table('sanphams')->where('tensp','regexp',$tensp)->paginate(3);
    }
    public static function addProduct($m,$t,$mt,$c,$g,$th,$l,$h,$tt){
        return DB::select('INSERT INTO sanpham(masp,tensp,mota,congdung,gia,math,loaisp,hinh,trangthai) VALUES (?,?,?,?,?,?,?,?,?)',[$m,$t,$mt,$c,$g,$th,$l,$h,$tt]);
    }
    public static function deleteProduct($m){
        return DB::select('DELETE FROM sanpham WHERE masp=?',[$m]);
    }
    public static function update_product($m,$t,$mt,$c,$g,$th,$l,$h,$tt){
        return DB::select('UPDATE sanpham SET masp=?, tensp=?, mota=?, congdung=?, gia=?, math=?, loaisp=?, hinh=?, trangthai=?
                           WHERE sanpham.masp =?',
                           [$m,$t,$mt,$c,$g,$th,$l,$h,$tt,$m]);
    }
}
?>