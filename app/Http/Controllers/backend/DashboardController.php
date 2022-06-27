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
use App\Models\donhang;
use App\Models\chitietdonhang;
session_start();
class DashboardController extends Controller
{
  
    public function index(Request $request){
        if(isset( $_SESSION['admin']))
        {
            if($request->kw){
                $getSP=sanpham::search($request->kw);
                return view('backend.index',compact('getSP'));
            }else if(!$request->kw){
            $getSP=sanpham::where('trangthai','regexp',0)->paginate(5);
            return view("backend.index",compact('getSP'));
            }
        }else {
            return Redirect::to('/');
        }
        
    }
    public function listdelete(){
        $getSP=sanpham::where('trangthai','regexp',1)->paginate(5);
        return view("backend.listdelete",compact('getSP'));
    }
    
    public function thuonghieu(){
        $getTH=thuonghieu::getTH();
        return view("backend.thuonghieu",compact('getTH'));
    }
    public function login()
    {
       
        return view('backend.login');
    }
    public function postlogin(Request $request)
    {
        $request->validate([
            'email'=>'required|max:60',
            'password'=>'required|max:100'
        ],[
            'email.required'=>'Vui lòng email tài khoản',
            'email.max'=>'Vui lòng nhập dưới :max ký tự',
            'password.required'=>'Vui lòng nhập password',
            'password.max'=>'Vui lòng nhập dưới 100 ký tự'
        ]);
        $e=$request->email;
        $p=md5($request->password);
        $data=admin::getLogin($e);
        
        //dd($p);
        if($data==NULL || $data[0]->password!=$p){
            
            return redirect()->route('ad.login')->with('fail', 'Đăng nhập không thành công. Email hoặc mật khẩu không đúng');
            
        } 
        
        elseif($data[0]->quyen==2 || $data[0]->quyen==3){
                 $_SESSION['admin']=$data;
                return Redirect::to('/admin');
          
            }else{
                $_SESSION['user']=$data;
                return Redirect::to('');
            }
            
     }
    public function logout()
    {
        unset($_SESSION['admin']);
        return Redirect::to('');
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
                move_uploaded_file($_FILES['img']['tmp_name'], "public/frontend/img/$hinh");
        }
        sanpham::addProduct($masp,$tensp,$mota,$congdung,$gia,$hang,$loaisp,$hinh,$trangthai);
        return redirect('/admin');
    }
    public function delete_pro(Request $request){
        $m=$request->masp;
        $tt="1";
        sanpham::deleteProduct($tt,$m);
        return redirect('/admin');
    }
    public function remove_pro(Request $request){
        $m=$request->masp;
        $tt="0";
        sanpham::deleteProduct($tt,$m);
        return redirect('/admin/listdelete');
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
        $mota=$request->mota;
        $congdung=$request->congdung;
        $trangthai=$request->status;
        $hinh="";
        if($_FILES['image']['name'] != ''){
    
            if (isset($_FILES['image']))
            {
                if ($_FILES['image']['error']==0) 
                {
                    $hinh = $_FILES['image']['name'];
                    move_uploaded_file($_FILES['image']['tmp_name'], "public/frontend/img/$hinh");
                     
                    
                }
            }
        }
        else {
            $hinh =isset($_POST['image_old'])?$_POST['image_old']:'';
        }
        
        sanpham::update_product($masp,$tensp,$mota,$congdung,$gia,$hang,$loaisp, $trangthai,$hinh);
        return redirect('/admin');
    }
    public function addhang(Request $request){
        $t=$request->tenhang;
        $tt="0";
        thuonghieu::addHang($t,$tt);
        return redirect('admin/thuonghieu');
    }
    public function delete_hang(Request $request){
        $id=$request->math;
        thuonghieu::delete_Hang($id);
        return redirect('admin/thuonghieu');
    }
    public function listDeTH(){
        $getDeTH=thuonghieu::getDeTH();
        return view("backend.listDeTH",compact('getDeTH'));

    }
    public function restoreTH(Request $request){
        $id=$request->maloai;
        thuonghieu::restore_Hang($id);
        return redirect('admin/thuonghieu');
   }
    public function loaisp(){
        $getLoai=loaisp::getLoai();
        return view("backend.loaisp",compact('getLoai'));
    }
    public function addloai(Request $request){
        $t=$request->tenloai;
        $tt="0";
        loaisp::addLoai($t,$tt);
        return redirect('admin/loaisp');
    }
    public function delete_loai(Request $request){
        $id=$request->maloai;
        loaisp::delete_Loai($id);
        return redirect('admin/loaisp');
    }
    public function listDeLoai(){
        $getDeLoai=loaisp::getDeLoai();
        return view("backend.listDeLoai",compact('getDeLoai'));

    }
    public function restoreLoai(Request $request){
         $id=$request->maloai;
         loaisp::restore_Loai($id);
         return redirect('admin/loaisp');
    }
    public function qlad(Request $request){
        $quyen=$request->quyen;
        if($quyen==3)
        {
            $getAdmin= admin::getAdmin();
        return view("backend.qlad",compact('getAdmin'));
        }
        return redirect ('admin/');
       
    }
    public function add_ad(){
        return view('backend.themadmin');
    }
    public function insert_ad(Request $request){
        $request->validate([
            'username'=>'required|max:20|min:3',
            'password'=>'required|max:100',
            'fullname'=>'required|min:5',
            'email'=>'required|email'
        ],[
            'username.required'=>'Vui lòng nhập :attribute',
            'username.max'=>'Vui lòng nhập dưới :max ký tự',
            'password.required'=>'Vui lòng nhập :attribute',
            'password.max'=>'Vui lòng nhập dưới :max ký tự',
            'fullname.required'=>'Vui lòng nhập :attribute',
            'fullname.min'=>'Vui lòng nhập hơn :min ký tự',
            'email.required'=>'Vui lòng nhập :attribute',

        ]);
        $u=$request->username;
        $n=$request->fullname;
        $e=$request->email;
        $p=md5($request->password);
        $q=$request->quyen;
        $data=admin::getByEmail($e);
        $hinh="";
        if($request->hasFile('image'))
        {
            
            if ($_FILES['image']['error']==0) 
                $hinh = $_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'], "public/backend/avatar/$hinh");
        }
        if($data!=NULL){
            return view('backend.themadmin');
        }else{
           admin::addAdmin($u,$p,$n,$e, $hinh,$q);
            return Redirect::to('/admin/qlad');
        }
    }
    public function delete_ad(Request $request){
        $u=$request->username;
        admin::delete_Ad($u);
        return Redirect::to('/admin/qlad');
    }
    public function edit_ad(Request $request){
        $e=$request->email;
        $getAdmin= admin::getByEmail($e);
        return view('backend.editadmin',compact('getAdmin'));
    }
    public function update_ad(Request $request){

        $request->validate([
            'username'=>'required|max:20|min:3',
            'fullname'=>'required|min:5',
            'email'=>'required|email',
        ],[
            'username.required'=>'Vui lòng nhập :attribute',
            'username.max'=>'Vui lòng nhập dưới :max ký tự',
            'fullname.required'=>'Vui lòng nhập :attribute',
            'fullname.min'=>'Vui lòng nhập hơn :min ký tự',
            'email.required'=>'Vui lòng nhập :attribute',

        ]);
        $u=$request->username;
        $n=$request->fullname;
        $e=$request->email;
        $q=$request->quyen;
        $hinh="";
        if($_FILES['image']['name'] != ''){
    
            if (isset($_FILES['image']))
            {
                if ($_FILES['image']['error']==0) 
                {
                    $hinh = $_FILES['image']['name'];
                    move_uploaded_file($_FILES['image']['tmp_name'], "public/backend/avatar/$hinh");
                }
            }
        }
        else {
            $hinh =isset($_POST['image_old'])?$_POST['image_old']:'';
        }
        
           admin::update_Ad($u,$n,$e,$q,$hinh);
            return Redirect::to('/admin/qlad');
        
    }
    public function donhang(){
        $getDH= donhang::all();
        return view("backend.donhang",compact('getDH'));
    }
    public function chitietDH(Request $request){
        
        $getCTD=chitietdonhang::getById($request->id);
        return view("backend.chitietDH", compact('getCTD'));
    }
    public function Updatetrangthaidon(Request $request){
        donhang::updateStatus($request->id, $request->status);
        return Redirect::to('/admin/donhang');
    }
}
?>