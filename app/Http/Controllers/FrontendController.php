<?php
namespace App\Http\Controllers;
session_start();
use Cart;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\admin;
use App\Models\sanpham;
use App\Models\diachi;
use App\Models\loaisp;
use App\Models\thuonghieu;
use App\Models\donhang;
use App\Models\danhgiasanpham;
use App\Models\binhluansp;
use App\Models\chitietdonhang;
use App\Mail\contactMail;
use App\Mail\forgetpassMail;
use App\Mail\confirmOrderMail;
use Illuminate\Support\Facades\Mail;
class FrontendController extends Controller
{
    public function index(){
        $getSP=sanpham::where('trangthai','regexp',0)->paginate(6);
        return view('frontend.index',compact('getSP'));
    }
    public function news(){
        return view('frontend.tintuc');
    }
    public function donate(){
        return view('frontend.ungho');
    }
    public function about(){
        return view('frontend.about');
    }
    public function contact(){
        return view('frontend.lienhe');
    }
    public function confirmorder(Request $request){
        return view('frontend.confirmorder');
    }
    public function forgetpass(){
        return view('backend.forgetpass');
    }
    public function binhluansp(Request $request){
        $request->validate([
            'mota'=>'required'
        ],[
            'mota.required'=>'Vui lòng nhập nội dung'
        ]);
        $solanmuasp=$request->solanmuasp;
        $masp=$request->masp;
        $username=$request->username;
        $mota=$request->mota;
        $datetime = Carbon::now();
        $datacmt=binhluansp::getCommentByUser($_SESSION['user'][0]->username,$masp);
        if(count($datacmt) == $solanmuasp){
            return redirect()->route('chitietsanpham',['id'=>$masp])->with('fail_cmt','Vui lòng mua hàng thêm để được bình luận!');
        }
        binhluansp::commentSp($masp,$username,$mota,$datetime);
        return redirect()->route('chitietsanpham',['id'=>$masp]);
    }
    public function rating(Request $request){
        $username = $_SESSION['user'][0]->username;
        $masp = $request->masp;
        $rate = $request->rating_star;
        $data = danhgiasanpham::getRatingUser($username,$masp);
        if($data->isEmpty()){
            danhgiasanpham::rating($masp,$username,$rate);
        }else{
            danhgiasanpham::updateRating($username,$rate);
        }
        $sum = 0;
        $count = 0;
        $datarating = danhgiasanpham::getRatingSp($masp);
        foreach($datarating as $sp){
            $sum += $sp->rate;
            $count++;
        }
        $rateSp = $sum/$count;
        sanpham::updateRate($masp,$rateSp);
        return redirect()->route('chitietsanpham',['id'=>$masp]);
    }
    public function postforgetpass(Request $request)
    {
        $request->validate([
            'email'=>'required|email'
        ],[
            'email.required'=>'Vui lòng nhập :attribute'
        ]);
        $e=$request->email;
        $data=admin::getByEmail($e);
        if($data==NULL){
            return redirect()->route('forgetpass')->with('fail', 'Email không đúng');
        }else{
            $mailable = new forgetpassMail($data);
            Mail::to($e)->send($mailable);
            return redirect()->route('forgetpass')->with('success', 'Gửi mail thành công vui lòng check Email');
        }
    }
    public function changepass($email)
    {
        return view("backend.changepass",compact('email'));
    }
    public function postchangepass(Request $request)
    {
        $request->validate([
            'newpassword'=>'required|max:100',
            'confirmpassword'=>'required|max:100'
        ],[
            'newpassword.required'=>'Vui lòng nhập password',
            'newpassword.max'=>'Vui lòng nhập dưới 100 ký tự',
            'confirmpassword.required'=>'Vui lòng nhập password',
            'confirmpassword.max'=>'Vui lòng nhập dưới 100 ký tự'
        ]);
        if($request->newpassword != $request->confirmpassword){
            return redirect()->route('changepass',['email'=>$request->email])->with('fail', 'Vui lòng nhập lại xác nhận');
        }
        $email=$request->email;
        $np=md5($request->newpassword);
        $cnp=md5($request->confirmpassword);
        $data=admin::getLogin($email);
        if($data[0]->password==$np){
            return redirect()->route('changepass',['email'=>$email])->with('fail', 'Vui lòng nhập mật khẩu mới');
        }else{
            admin::updatePassword($email,$cnp);
            return redirect()->route('ad.login')->with('success', 'Đổi password thành công');
        }
    }
    public function settingpass(Request $request)
    {
        $request->validate([
            'newpassword'=>'required|max:100',
            'confirmpassword'=>'required|max:100'
        ],[
            'newpassword.required'=>'Vui lòng nhập mật khẩu',
            'newpassword.max'=>'Vui lòng nhập dưới 100 ký tự',
            'confirmpassword.required'=>'Vui lòng nhập lại mật khẩu mới',
            'confirmpassword.max'=>'Vui lòng nhập dưới 100 ký tự'
        ]);
        if($request->newpassword != $request->confirmpassword){
            return redirect()->route('account_settings')->with('fail', 'Mật khẩu mới và mật khẩu mới xác nhận không trùng. Vui lòng nhập lại!');
        }else if(md5($request->newpassword) == $request->oldpassword){
            return redirect()->route('account_settings')->with('fail','Mật khẩu mới trùng với mật khẩu cũ. Vui lòng nhập lại!');
        }
        $email=$request->email;
        $np=md5($request->newpassword);
        $cnp=md5($request->confirmpassword);
        admin::updatePassword($email,$np);
        return redirect()->route('account_settings')->with('success', 'Đổi password thành công');
    }
    public function editaddress(Request $request){
        $request->validate([
            'phone'=>'required|min:10|max:10',
            'address'=>'required|min:10'
        ],[
            'phone.required'=>'Vui lòng nhập :attribute',
            'phone.min'=>'Vui lòng nhập tối thiểu :min số',
            'phone.max'=>'Vui lòng nhập tối đa :max số',
            'address.required'=>'Vui lòng nhập :attribute',
            'address.min'=>'Vui lòng nhập hơn :min ký tự'
        ]);
        $user=$request->username;
        $phone=$request->phone;
        $address=$request->address;
        $data=diachi::findAddress($user);
        foreach($data as $dc){
            if($phone == $dc->sdt && $dc->trangthai == 0){
                return redirect()->route('account_settings')->with('fail_updateaddress','Số điện thoại vừa cập nhật đã có. Vui lòng nhập lại!');
            }else if($address == $dc->diachi && $dc->trangthai == 0){
                return redirect()->route('account_settings')->with('fail_updateaddress','Địa chỉ vừa cập nhật đã có. Vui lòng nhập lại!');
            }
        } 
        diachi::updateAddress($user,$phone, $address);
        return redirect()->route('account_settings')->with('success_updateaddress', 'Đổi thông tin địa chỉ thành công');
    }
    public function defaultaddress(Request $request){
        $username=$request->username;
        $phone=$request->phone;
        $status=$request->status;
        if($status == 1){
            return redirect()->route('account_settings')->with('notification','Đây là địa chỉ mặc định!');
        }
        diachi::changeAllStatus($username);
        diachi::defaultAddress($phone);
        return redirect()->route('account_settings')->with('success_changedefault','Đổi địa chỉ mặc định thành công!');
    }
    public function newaddress(Request $request){
        $request->validate([
            'newphone'=>'required|min:10|max:10',
            'newaddress'=>'required|min:10'
        ],[
            'newphone.required'=>'Vui lòng nhập số điện thoại',
            'newphone.min'=>'Vui lòng nhập tối thiểu :min số',
            'newphone.max'=>'Vui lòng nhập tối đa :max số',
            'newaddress.required'=>'Vui lòng nhập địa chỉ',
            'newaddress.min'=>'Vui lòng nhập hơn :min ký tự'
        ]);
        $username=$_SESSION['user'][0]->username;
        $phone=$request->newphone;
        $address=$request->newaddress;
        $data=diachi::findAddress($username);
        if(count($data)==5){
            return redirect()->route('account_settings')->with('fail_newaddress','Đã đạt số lượng tối đa địa chỉ không thể thêm!');
        }
        foreach($data as $dc){
            if($phone == $dc->sdt){
                return redirect()->route('account_settings')->with('warn_newaddress','Số điện thoại vừa cập nhật đã có. Vui lòng nhập lại!');
            }else if($address == $dc->diachi){
                return redirect()->route('account_settings')->with('warn_newaddress','Địa chỉ vừa cập nhật đã có. Vui lòng nhập lại!');
            }
        } 
        diachi::addAddress($username,$phone,$address);
        return redirect()->route('account_settings')->with('success_newaddress','Thêm địa chỉ mới thành công!');
    }
    public function sendmail(Request $request){
        $request->validate([
            'hoten'=>'required|max:30|min:10',
            'email'=>'required|max:30|min:15',
            'tieude'=>'required|min:15',
            'noidung'=>'required'
        ],[
            'hoten.required'=>'Vui lòng nhập họ tên',
            'hoten.max'=>'Vui lòng nhập dưới :max ký tự',
            'hoten.min'=>'Vui lòng nhập trên :min ký tự',
            'email.required'=>'Vui lòng nhập E-mail',
            'email.max'=>'Vui lòng nhập dưới :max ký tự',
            'email.min'=>'Vui lòng nhập trên :min ký tự',
            'tieude.required'=>'Vui lòng nhập tiêu đề',
            'tieude.min'=>'Vui lòng nhập hơn :min ký tự',
            'noidung.required'=>'Vui lòng nhập nội dung'
        ]);
        $data['hoten'] = $request->hoten;
        $data['email'] = $request->email;
        $data['tieude'] = $request->tieude;
        $data['noidung'] = $request->noidung;
        $mailable = new contactMail($data);
        Mail::to('lpham776@gmail.com')->send($mailable);
        // dd($mailable);
        // Mail::to($email)->send();
        return redirect()->to('contact')->with('success', 'Đã gửi ý kiến của bạn đến chúng mình!');
    }
    public function sanpham(Request $request){
        if($request->kw){
            $getSP=sanpham::search($request->kw);
            $getLoai=loaisp::getLoai();
            $getTH=thuonghieu::getTH();
            return view('frontend.sanpham',compact('getSP','getLoai', 'getTH'));
        }else if(!$request->kw){
            $getLoai=loaisp::getLoai();
            $getTH=thuonghieu::getTH();
            $getSP=sanpham::where('trangthai','regexp',0)->paginate(6);
            return view('frontend.sanpham',compact('getSP' ,'getLoai', 'getTH'));
        }
    }
    public function locLoai(Request $request){
        $id=$request->id;
        $getLoai=loaisp::getLoai();
        $getTH=thuonghieu::getTH();
        $getSP=sanpham::where('loaisp','regexp',$id)->where('trangthai','regexp',0)->paginate(6);
        return view('frontend.sanpham',compact('getSP' ,'getLoai', 'getTH'));
    }
    public function locTH(Request $request){
        $id=$request->id;
        $getLoai=loaisp::getLoai();
        $getTH=thuonghieu::getTH();
        $getSP=sanpham::where('math','regexp',$id)->where('trangthai','regexp',0)->paginate(6);
        return view('frontend.sanpham',compact('getSP' ,'getLoai', 'getTH'));
    }
    public function chitietsanpham(Request $request){
        $getSP=sanpham::getById($request->id);
        $getAll = sanpham::all();
        $getBl = binhluansp::getCommentSp($request->id);
        $getTH = thuonghieu::getTH();
        $getUsers = admin::all();
        $getDH = donhang::findDH($_SESSION['user'][0]->username);
        $getCTDH = chitietdonhang::all();
        $countSpDh=0;
        foreach($getDH as $dh){
            foreach($getCTDH as $ctdh){
                if($dh->madon == $ctdh->madon){
                    if($request->id == $ctdh->masp){
                        $countSpDh++;
                    }
                }
            }
        }
        return view('frontend.chitietsanpham',compact('getSP','getAll','getTH','getBl','getUsers','countSpDh'));
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
        $p=md5($request->password);
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
        if(isset($_SESSION['user'])){
            $getDC=diachi::findAddress($_SESSION['user'][0]->username);
            return view('frontend.giohang',compact('getDC'));
        }
        return view('frontend.giohang');
        
    }
    public function postcart(Request $request){
        $masp=$request->masp;
        $sl=$request->soluong;
        if(($sl==0) || ($sl>=4)){
            return redirect()->route('chitietsanpham',['id'=>$masp]);
        }
        if(Cart::content()->isEmpty()){
            $spdetail=sanpham::getById($masp);
            Cart::add([
                'id' => $spdetail[0]->masp, 
                'name' => $spdetail[0]->tensp, 
                'qty' => $sl, 
                'price' => $spdetail[0]->gia, 
                'weight' => 1, 
                'options' => ['images' => $spdetail[0]->hinh]
            ]);
            return redirect()->route('giohang');
        }
        foreach(Cart::content() as $cart){
            if($cart->id == $masp){
                if((($cart->qty+$sl) >= 4)){
                    return redirect()->route('chitietsanpham',['id'=>$masp]);
                }
            }
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
        return redirect()->route('giohang');

        if(isset($_SESSION['user'])){
            if(($sl==0) || ($sl>=4)){
                return redirect()->route('chitietsanpham',['id'=>$masp]);
            }
            foreach(Cart::content() as $cart){
                if($cart->id == $masp){
                    if((($cart->qty+$sl) >= 4)){
                        return redirect()->route('chitietsanpham',['id'=>$masp]);
                    }
                }
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
            return redirect()->route('giohang');
        }
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
        }else if(Cart::count()==0){
            return redirect()->route('sanpham');
        }
        $hoten=$request->hoten;
        $diachi=$request->diachi;
        $dienthoai=$request->dienthoai;
        $email=$request->email;
        $pttt=$request->pttt;
        if($pttt === "Thanh toán khi nhận hàng") $pttt=0;
        else $pttt=1;
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
        $thongtin['hoten']=$hoten;
        $thongtin['diachi']=$diachi;
        $thongtin['dienthoai']=$dienthoai;
        $thongtin['email']=$email;
        if($pttt==1) $thongtin['pttt']= 'Thanh Toán Online';
        else $thongtin['pttt']='Thanh Toán Khi Nhận Hàng';
        $lastIdWithUser=donhang::lastIdWithUser($_SESSION['user'][0]->username);
        $SpDonhang=chitietdonhang::getById($lastIdWithUser->madon);
        $mailable = new confirmOrderMail($thongtin,$content,Cart::total());
        Mail::to('lpham776@gmail.com')->send($mailable);
        return view('frontend.donhang',compact('thongtin','SpDonhang'));
    }
    public function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data))
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }
    public function momo_payment(Request $request){

        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";


        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán qua ATM MoMo";
        $amount = "10000";
        $orderId = time() . "";
        $redirectUrl = "http://localhost/LV-Pet-Community/giohang";
        $ipnUrl = "http://localhost/LV-Pet-Community/giohang";
        $extraData = "";


        $requestId = time() . "";
        $requestType = "payWithATM";
        // $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
        //before sign HMAC SHA256 signature
        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, $secretKey);
        $data = array('partnerCode' => $partnerCode,
            'partnerName' => "Test",
            "storeId" => "MomoTestStore",
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature);
        $result = $this->execPostRequest($endpoint, json_encode($data));
        $jsonResult = json_decode($result, true);  // decode json
        dd($result);
        //Just a example, please check more in there

        // header('Location: ' . $jsonResult['payUrl']);
    }
    public function vn_payment(Request $request){
        $id = rand(0000,9999);
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://petcommunity.net/confirmorder";
        $vnp_TmnCode = "1AXLM0YG";//Mã website tại VNPAY 
        $vnp_HashSecret = "DKPERIOVZTXETSJBIFAQESBKGUNMEDSP"; //Chuỗi bí mật

        $vnp_TxnRef = $id; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = 'Thanh toán đơn hàng test';
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = (int)Cart::total() * 100000;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        //Add Params of 2.0.1 Version
        // $vnp_ExpireDate = $_POST['txtexpire'];
        //Billing
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array('code' => '00'
            , 'message' => 'success'
            , 'data' => $vnp_Url);
        if (isset($_POST['redirect'])) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
    }
    public function account(){
        $user=$_SESSION['user'][0]->username;
        $diachi= diachi::findAddress($user);
        $donhang= donhang::findDH($user);
        $dataUser = admin::getByUser($user);
        return view('frontend.account',compact('diachi','donhang','dataUser'));
    }
    public function chitietDH(Request $request){
        $user=$_SESSION['user'][0]->username;
        $thongtin=donhang::findByMaDon($request->id);
        $diachi= diachi::findAddress($user);
        $getCTD=chitietdonhang::getById($request->id);
        $dataUser = admin::getByUser($user);
        return view("frontend.chitietDH", compact('diachi','getCTD','dataUser','thongtin'));
    }
    public function editAccount(Request $request){
        $user=$_SESSION['user'][0]->username;
        $diachi= diachi::findAddress($user);
        $dataUser = admin::getByUser($user);
        return view('frontend.edit_account',compact('diachi','dataUser'));
    }
    public function account_settings(Request $request){
        $user=$_SESSION['user'][0]->username;
        $diachi= diachi::findAddress($user);
        $dataUser = admin::getByUser($user);
        return view('frontend.account_settings',compact('diachi','dataUser'));
    }
    public function editInfo(Request $request){
        $username = $request->username;
        $hoten = $request->hoten;
        $email = $request->email;
        $hinh = $request->hinh;
        if($request->hasFile('image'))
        {
            if ($_FILES['image']['error']==0) {
                $hinh = $_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'], "public/frontend/avatar/$hinh");
            }
        }else if($hinh == NULL){
            $hinh = "";
        }
        $_SESSION['user'][0]->hoten=$hoten;
        admin::updateuser($username,$hoten,$email,$hinh);
        return redirect()->route('account_settings');
    }
    public function updateAddress(Request $request){
        $request->validate([
            'fullname'=>'required|min:5',
            'email'=>'required|email',
            'phone'=>'required',
            'address'=>'required|min:10'
        ],[
            'phone.required'=>'Vui lòng nhập :attribute',
            'fullname.required'=>'Vui lòng nhập :attribute',
            'fullname.min'=>'Vui lòng nhập hơn :min ký tự',
            'email.required'=>'Vui lòng nhập :attribute',
            'address.required'=>'Vui lòng nhập :attribute',
            'address.min'=>'Vui lòng nhập hơn :min ký tự',

        ]);
        $user=$request->username;
        $email=$request->email;
        $fullname=$request->fullname;
        $phone=$request->phone;
        $address=$request->address;
        diachi::updateAddress($user,$phone, $address);
        admin::updateuser($user,$fullname,$email);
        return Redirect::to('/account');

    }
    public function cancelorder(Request $request){
        if($request->status >= 1 && $request->status <= 3){
            return redirect()->route('account')->with('fail_cancelorder','Không thể hủy đơn khi đã xác nhận!');
        }else if($request->status == 4){
            return redirect()->route('account')->with('warn_cancelorder','Không thể hủy đơn khi đã hủy!');
        }
        donhang::updateStatus($request->madon,4);
        return redirect()->route('account')->with('success_cancelorder','Hủy đơn thành công!');
    }
}
