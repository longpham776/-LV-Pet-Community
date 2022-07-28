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
        dd($request->all());
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
        $masp=$request->masp;
        $username=$request->username;
        $mota=$request->mota;
        $datetime = Carbon::now();
        binhluansp::commentSp($masp,$username,$mota,$datetime);
        return redirect()->route('chitietsanpham',['id'=>$masp]);
    }
    public function rating(Request $request){
        $username = $request->username;
        $masp = $request->masp;
        $rate = $request->rating_star;
        $data = danhgiasanpham::getRatingUser($username);
        if($data->isEmpty()){
            danhgiasanpham::rating($masp,$username,$rate);
        }else{
            danhgiasanpham::updateRating($username,$rate);
        }
        $sum = 0;
        $count = 0;
        $data = danhgiasanpham::getRatingSp($masp);
        foreach($data as $sp){
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
        return view('frontend.chitietsanpham',compact('getSP','getAll','getTH','getBl'));
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
        //dd($getDC);
        return view('frontend.giohang',compact('getDC'));
        }
        return view('frontend.giohang');
        
    }
    public function postcart(Request $request){
        if(isset($_SESSION['user'])){
            $getDC=diachi::findAddress($_SESSION['user'][0]->username);
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
            return view('frontend.giohang',compact('getDC'));
        }
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
        }else if(Cart::count()==0){
            $getSP=sanpham::where('trangthai','regexp',0)->paginate(4);
            return view('frontend.sanpham',compact('getSP'));
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
        $thongtin['hoten']=$hoten;
        $thongtin['diachi']=$diachi;
        $thongtin['dienthoai']=$dienthoai;
        $thongtin['email']=$email;
        if($pttt==1) $thongtin['pttt']= 'Thanh Toán Online';
        else $thongtin['pttt']='Thanh Toán Khi Nhận Hàng';
        $lastIdWithUser=donhang::lastIdWithUser($_SESSION['user'][0]->username);
        $SpDonhang=chitietdonhang::getById($lastIdWithUser->madon);
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
        dd($request->all());
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
      // dd($donhang);
        return view('frontend.account',compact('diachi','donhang','dataUser'));
    }
    public function chitietDH(Request $request){
        $user=$_SESSION['user'][0]->username;
        $diachi= diachi::findAddress($user);
        $getCTD=chitietdonhang::getById($request->id);
        $dataUser = admin::getByUser($user);
        return view("frontend.chitietDH", compact('diachi','getCTD','dataUser'));
    }
    public function editAccount(Request $request){
        $user=$_SESSION['user'][0]->username;
        $diachi= diachi::findAddress($user);
        $dataUser = admin::getByUser($user);
        return view('frontend.edit_account',compact('diachi','dataUser'));
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
} 
?>