<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class sanpham extends Model
{
    use HasFactory;
    public function getAll(){
        return DB::select('SELECT * FROM sanpham WHERE trangthai=0 ORDER BY masp ASC');
    }
}
?>