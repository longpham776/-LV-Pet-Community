<?php
namespace App\Http\Controllers;

session_start();
use Cart;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\admin;
use App\Models\sanpham;
use App\Models\diachi;
use App\Models\donhang;
use App\Models\chitietdonhang;
class FrontendController extends Controller
{
    public function index(){
        $getSP=sanpham::where('trangthai','regexp',0)->paginate(6);
        return view('frontend.index',compact('getSP'));
    }
    public function sanpham(Request $request){
        if($request->kw){
            $getSP=sanpham::search($request->kw);
            return view('frontend.sanpham',compact('getSP'));
        }else if(!$request->kw){
            $getSP=sanpham::where('trangthai','regexp',0)->paginate(4);
            return view('frontend.sanpham',compact('getSP'));
        }
    }
    public function chitietsanpham(Request $request){
        $getSP=sanpham::getById($request->id);
        $getAll = sanpham::all();
        return view('frontend.chitietsanpham',compact('getSP','getAll'));
    }
    public function timkiem(Request $request){
        $getSP=sanpham::search($request->id);
        return view('frontend.chitietsanpham',compact('getSP','getAll'));
    }
    public function logout()
    {
        unset($_SESSION['user']);
        
        return Redirect::to('');
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
    public function giohang(){
        return view('frontend.giohang');
    }
    public function postcart(Request $request){
        
        $masp=$request->masp;
        $sl=$request->soluong;
        if(($sl==0) || ($sl>=5)){
            $getSP=sanpham::getById($masp);
            $getAll= sanpham::all();
            return view('frontend.chitietsanpham',compact('getSP','getAll'));
        }
        $spdetail=sanpham::getById($masp);
        Cart::add([
            'id' => $spdetail[0]->masp, 
            'name' => $spdetail[0]->tensp, 
            'qty' => $sl, 
            'price' => $spdetail[0]->gia, 
            'weight' => 1, 
            'options' => ['images' => $spdetail[0]->hinh]
        ]);
        return view('frontend.giohang');
    }
    public function delcart($rowId)
    {
        Cart::remove($rowId);
        return Redirect::to('/giohang');
    }
    public function destroycart()
    {
        Cart::destroy();
        return Redirect::to('/giohang');
    }
    public function upcart($id,$qty)
    {
        dd($id,$qty);
        for($i=0;$i<Cart::count();$i++){
            Cart::update($data[$id]->id,$data[$qty]->qty);
        }
        return Redirect::to('/cart');
    }
    public function checkout()
    {
        if(!isset($_SESSION['user'])){ return redirect()->route('ad.login');}
        return view('frontend.donhang');
    }
    public function postcheckout(Request $request)
    {
        if(!isset($_SESSION['user'])){ 
            return redirect()->route('ad.login');
        }
        $hoten=$request->hoten;
        $diachi=$request->diachi;
        $dienthoai=$request->dienthoai;
        $email=$request->email;
        $pttt=$request->pttt;
        $thanhtien=Cart::pricetotal();
        $content= Cart::content();
        donhang::addBill($_SESSION['user'][0]->username,$hoten,$diachi,$dienthoai,$email,$pttt,$thanhtien);
        $lastId=donhang::lastId();
        foreach($content as $sp){
            chitietdonhang::addOrder(
                $sp->id,
                $sp->name,
                $sp->price,
                $sp->options->images,
                $sp->qty,
                $thanhtien,
                $lastId->madon
            );
        }
        Cart::destroy();
        return view('frontend.donhang');
    }
} 
?>