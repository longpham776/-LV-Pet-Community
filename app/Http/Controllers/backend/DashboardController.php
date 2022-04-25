<?php
namespace App\Http\Controllers\backend;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\admin;
use App\Models\sanpham;
use App\Models\loaisp;
use App\Models\thuonghieu;
session_start();
class DashboardController extends Controller
{
  
    public function index(){
        $getSP=sanpham::getAll();
        return view("backend.index",compact('getSP'));
    }
    public function index2(){
        return view("backend.index4");
    }
    public function login()
    {
       
        return view('backend.login');
    }
    public function postlogin(Request $request)
    {
        $request->validate([
            'email'=>'required|max:20',
            'password'=>'required|max:100'
        ],[
            'email.required'=>'Vui lòng email tài khoản',
            'email.max'=>'Vui lòng nhập dưới :max ký tự',
            'password.required'=>'Vui lòng nhập password',
            'password.max'=>'Vui lòng nhập dưới 100 ký tự'
        ]);
        $e=$request->email;
        $p=$request->password;
        $data=admin::getLogin($e,$p);
        
        //dd($data);
        if($data==NULL){
            //Session::flash('fail', 'Đăng nhập không thành công. tên tài khoản hoặc mật khẩu không đúng');
            return redirect()->route('login')->with('fail', 'Đăng nhập không thành công. tên tài khoản hoặc mật khẩu không đúng');
            
        } 
        
        elseif($data[0]->quyen==2 || $data[0]->quyen==3){
                 $_SESSION['admin']=$data;
                return Redirect::to('/admin');
          
            }else{
                $_SESSION['user']=$data;
                return view('frontend.index');
            }
            
     }
    public function logout()
    {
        return view('frontend.index');
    }
    public function addsp(){
        $getLoai=loaisp::getLoai();
        $getTH=thuonghieu::getTH();
        return view("backend.themsp",compact('getLoai','getTH'));
    }
    public function insert_pro(Request $request){

        $request->validate([
            'masp' =>'required',
            'tensp' =>'required',
            'gia' =>'required',
            'img'=>'required|mimes:jpg,jpeg,png,gif',
            'mota'=>'required|max:500',
            'congdung'=>'required|max:500',

        ],[
            'masp.required'=>'Vui lòng nhập mã sản phẩm',
            'tensp.required'=>'Vui lòng nhập tên sản phẩm',
            'gia.required'=>'Vui lòng nhập giá',
            'img.required'=>'Vui lòng chọn hình',
            'img.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
            'mota.required'=>'Vui lòng nhập mô tả cho sản phẩm',
            'mota.max'=>'Vui lòng nhập dưới :max ký tự',
            'congdung.required'=>'Vui lòng nhập công dụng sản phẩm',
            'congdung.max'=>'Vui lòng nhập dưới :max ký tự'
        ]);

        $masp=$request->masp;
        $tensp=$request->tensp;
        $loaisp=$request->loaisp;
        $hang=$request->hang;
        $gia=$request->gia;
        $hinh="";
        $mota=$request->mota;
        $congdung=$request->congdung;
        $trangthai=$request->status;
        if($request->hasFile('img'))
        {
            
            if ($_FILES['img']['error']==0) 
                $hinh = $_FILES['img']['name'];
                move_uploaded_file($_FILES['img']['tmp_name'], "public/frontend/assets/img/$hinh");
        }
        sanpham::addProduct($masp,$tensp,$mota,$congdung,$gia,$hang,$loaisp,$hinh,$trangthai);
        return redirect('/admin');
    }
    public function delete_pro(Request $request){
        $m=$request->masp;
        sanpham::deleteProduct($m);
        return redirect('/admin');
    }
    public function edit_pro(Request $request){
        $id=$request->masp;
        $getSP=sanpham::getById($id);
        $getLoai=loaisp::getLoai();
        $getTH=thuonghieu::getTH();
        return view("backend.editsp",compact('getSP','getLoai','getTH'));
    }
    public function update_pro(Request $request){
        $masp=$request->masp;
        $tensp=$request->tensp;
        $loaisp=$request->loaisp;
        $hang=$request->hang;
        $gia=$request->gia;
        $hinh="";
        $mota=$request->mota;
        $congdung=$request->congdung;
        $trangthai=$request->status;
        if($request->hasFile('img'))
        {
            
            if ($_FILES['img']['error']==0) 
                $hinh = $_FILES['img']['name'];
                move_uploaded_file($_FILES['img']['tmp_name'], "public/frontend/assets/img/$hinh");
        }
        sanpham::update_product($masp,$tensp,$mota,$congdung,$gia,$hang,$loaisp,$hinh,$trangthai);
        return redirect('/admin');
    }
}
?>