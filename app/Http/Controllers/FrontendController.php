<?php
namespace App\Http\Controllers;

session_start();
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\admin;
use App\Models\sanpham;
use App\Models\diachi;
class FrontendController extends Controller
{
    public function index(){
        return view('frontend.index');
    }
    public function sanpham(){
        $getSP=sanpham::getAll();
        return view('frontend.sanpham',compact('getSP'));
    }
    public function logout()
    {
        unset($_SESSION['user']);
        
        return view('frontend.index');
    }
    public function register(){
        return view('backend.register');
    }
    public function postregister(Request $request)
    {
        $request->validate([
            'username'=>'required|max:20|min:3',
            'password'=>'required|max:100',
            'fullname'=>'required|min:5',
            'email'=>'required|email',
            'phone'=>'required',
            'address'=>'required|min:10',
        ],[
            'username.required'=>'Vui lòng nhập :attribute',
            'username.max'=>'Vui lòng nhập dưới :max ký tự',
            'password.required'=>'Vui lòng nhập :attribute',
            'password.max'=>'Vui lòng nhập dưới :max ký tự',
            'fullname.required'=>'Vui lòng nhập :attribute',
            'fullname.min'=>'Vui lòng nhập hơn :min ký tự',
            'email.required'=>'Vui lòng nhập :attribute',
            'phone.required'=>'Vui lòng nhập :attribute',
            'address.required'=>'Vui lòng nhập :attribute',
            'address.min'=>'Vui lòng nhập hơn :min ý tự'
        ]);
        $u=$request->username;
        $n=$request->fullname;
        $e=$request->email;
        $ph=$request->phone;
        $dc=$request->address;
        $p=$request->password;
        $data=admin::getByEmail($e);
        if($data!=NULL){
            return view('backend.register');
        }else{
           admin::addUser($u,$p,$n,$e);
            diachi::addAddress($u,$ph,$dc);
            return Redirect::to('/admin/login');
        }

    }
} 
?>