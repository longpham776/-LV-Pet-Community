<?php
namespace App\Http\Controllers;

use App\Models\sanpham;
class FrontendController extends Controller
{
    public function index(){
        return view('frontend.index');
    }
    public function sanpham(){
        $getSP=sanpham::getAll();
        return view('frontend.sanpham',compact('getSP'));
    }
} 
?>