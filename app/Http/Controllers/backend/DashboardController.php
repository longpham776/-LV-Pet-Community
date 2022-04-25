<?php
namespace App\Http\Controllers\backend;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\admin;
use App\Models\sanpham;
use App\Models\loaisp;
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
        return view("backend.themsp",compact('getLoai'));
    }
    
}
?>