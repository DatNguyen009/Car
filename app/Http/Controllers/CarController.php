<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Collection;
use Carbon\Carbon;
use App\Models\products;
use App\Models\schedule;
use App\Models\User;
use Crypt;
use Session;
use Mail;
use Alert;
use Auth;
class CarController extends Controller
{
    // validator login
    protected function Validator(array $data){
        return Validator::make($data, 
        [
            'username' => 'required|email',
            'password' => 'required|min:6',
          
        ],
        [
            'username.required' => 'Email không được để trống',
            'username.email' => 'Không đúng địa chỉ email',
            'password.required' => 'Password không được để trống',
            'password.min' => 'Password phải có ít nhất 6 kí tự',
            // 'confirm_password.min' => 'Confirm_Password phải có ít nhất 6 kí tự',
            // 'confirm_password.required' => 'Mật khẩu xác nhận không được để trống',
        ]
            
        );
    }

    // view home
    public function Home() {
        $data['products'] = products::limit(3)->get();
        return view('Home',$data);
    }

    //view car detail
    public function CarDetail($id) {
        $data['products'] = products::where('prod_name', $id)->get();
        return view('detail', $data);
    }

    // view shop
    public function CarDetail_Shop() {
        $data['products'] = products::paginate(6);
        return view('shop', $data);
    }

    //view search
    public function search(Request $request) {
        $value = $request->search;
        $data['keyword'] = $value;
        $data['all_data'] = products::where('prod_name','like','%'.$value.'%')->get();
        return view('search', $data);
       
    }

    //view schedule
    public function Schedule($id) {
        if (Session::has('login_client')) {
            $data['id'] = $id;
            $data['checkTestDrive'] = products::select('IsListTestDrive')->where('prod_id', $id)->get();
            foreach ($data['checkTestDrive'] as $key => $value) {   
                if ($value->IsListTestDrive == 'co') {
                    return view('shedule', $data);
                } else {
                    Session::put('NotTestDrive', 'Xe này không có trong danh sách lái thử');
                    return back();
                }
            }
           
        } else {
            $urlSchedule = url()->current();
            Session::put('urlSchedule', $urlSchedule);
            return \redirect('Login');
        }
        
       
    }

    public function SuggestHour($arrhour, $arr ) {
        for($i = 0; $i < 100; $i++)
            {
                $data = array('07:00:00', '07:30:00', '08:00:00', '08:30:00','09:00:00','09:30:00', '10:00:00', '10:30:00', '11:00:00','11:30:00', '12:00:00','12:30:00', '13:00:00','13:30:00', '14:00:00','14:30:00', '15:00:00','15:30:00', '16:00:00','16:30:00', '17:00:00','17:30:00', '18:00:00','18:30:00');
                $excluded_data = array_values(array_diff($data, $arrhour));
                $rand = rand(0,count($excluded_data)-1);
              
                if ((''.$excluded_data[$rand] <= $getTimeNow->toTimeString())  ) {
                    continue;
                } else {
                    if(in_array($excluded_data[$rand], $arr))
                    {
                        continue;
                    }
                    else{
                        if(count($arr) < 5)
                        {
                            array_push($arr, $excluded_data[$rand]);
                        }
                        else{
                            break;
                        }
                    }
                }
                
            }
            
            sort($arr);

            for ($i=0; $i < \count($arr) ; $i++) { 
                echo $arr[$i]."h". ",";
            }
    }

    // post schedule
    public function PostSchedule(Request $request) {
        $getTimeNow = Carbon::now();
        $dateSchedule = $request->date." ".$request->hour;

        if ($getTimeNow->toDateTimeString() > $dateSchedule) {
            echo "error";
        } else {
           
            $checkdate = schedule::where('prod_id', $request->id)->where("appointmentSchedule", $dateSchedule)->where('status', 'chua den hen')->get();
            
           
           
            $gethour = schedule::select('appointmentSchedule')->where('prod_id', $request->id)->where('status', 'chua den hen')->whereDate('appointmentSchedule',$request->date)->orderBy('appointmentSchedule', 'asc')->get();
            
           
            $arrhour = array();
            $arr = array();
            $gethour->each(function($gethours, $key) use ($arrhour) {
                $item =  explode(" ", $gethours->appointmentSchedule);
                array_push($arrhour, "".$item[1]);
            });

            if ((count($checkdate) > 0)) {
                
                foreach ($gethour as $key => $gethours) {
                    $item =  explode(" ", $gethours->appointmentSchedule);
                    array_push($arrhour, "".$item[1]);
                }
                if ((''.$getTimeNow->toDateString() == ''.$request->date) && (''.$getTimeNow->toTimeString() < ''.$request->hour) && (''.$request->hour < '18:00:00' ) && (''.$getTimeNow->toTimeString() < '18:00:00' )) {
        
                    $this->SuggestHour($arrhour, $arr);
                    
                } else {
                    if ((''.$getTimeNow->toDateString() < ''.$request->date)) {
                            for($i = 0; $i < 100; $i++)
                            {
                                $data = array('07:00:00', '07:30:00', '08:00:00', '08:30:00','09:00:00','09:30:00', '10:00:00', '10:30:00', '11:00:00','11:30:00', '12:00:00','12:30:00', '13:00:00','13:30:00', '14:00:00','14:30:00', '15:00:00','15:30:00', '16:00:00','16:30:00', '17:00:00','17:30:00', '18:00:00','18:30:00');
                                $excluded_data = array_values(array_diff($data, $arrhour));
                                $rand = rand(0,count($excluded_data)-1);
                             
                                if(in_array($excluded_data[$rand], $arr))
                                {
                                    continue;
                                }
                                else{
                                    if(count($arr) < 5)
                                    {
                                        array_push($arr, $excluded_data[$rand]);
                                    }
                                    else{
                                        break;
                                    }
                                }
                                
                                
                            }
                            
                            sort($arr);
        
                            for ($i=0; $i < \count($arr) ; $i++) { 
                                echo $arr[$i]."h". ",";
                            }
                    } else {
                        echo "error";
                    }
                }
                    
              
            } else {    
               
                schedule::insert(['prod_id' => $request->id,'customer'=>$request->name,'email'=>$request->email,'address'=>$request->address,'SDT'=>$request->PhoneNumber,'appointmentSchedule'=> $dateSchedule,'message'=>$request->message,'status'=>'chua den hen']);  
                $data['getNamecar'] = products::select('prod_name')->where('prod_id', $request->id)->get();
                foreach ($data['getNamecar'] as $key => $value) {
                    Session::put('nameCar', $value->prod_name);
                }  
                Session::put('name', $request->name);
                Session::put('sdt', $request->PhoneNumber);
                Session::put('dateSchedule', $dateSchedule);
                Session::put('schedule_success', 'dat lich thanh cong');
                echo "success";
            }
        }
    }

    //filter cost car
    
    public function filtermintomax() {
        $data['filterPiece'] =  products::orderby('prod_cost','asc')->paginate(6);
        return view('filter', $data);
    }

    public function filtermaxtomin() {
        $data['filterPiece'] =  products::orderby('prod_cost','desc')->paginate(6);
        return view('filter', $data);
    }

    // public function VerifyEmail(Request $request) {
        
    //         if ($request->code  == session('code')) {
    //             schedule::insert(['prod_id' => session('id'),'customer'=>session('name'),'email'=>session('email'),'address'=>session('address'),'SDT'=>session('phone'),'appointmentSchedule'=>session('date'),'message'=>session('message'),'status'=>'chua den hen']);
    //             Session::forget('id');
    //             Session::forget('code');
    //             Session::forget('name');
    //             Session::forget('email');
    //             Session::forget('phone');
    //             Session::forget('date');
    //             Session::forget('address');
    //             Session::forget('message');
    //             return \redirect('/')->with('sucess_mail', 'Đặt lịch lái thử thành công!!');
              
    //         } else {

    //             return back()->withErrors(['err_code' => 'Mã xác nhận không hợp lệ']);
    //         }
       
        
       
       
    // }

    //view login
    public function Login() {
        if (Session::has('login_client')) {
            return redirect('/');
        }
        else
        {
            $urlPrevious = url()->previous();
            $urlPageDetail = url()->to('detail/');
            $urlBase =  url()->to('/');
           
            if (strpos($urlPrevious,'detail') == true) {
                session()->put('url.intended', session('urlSchedule'));
            } else {
                session()->put('url.intended', $urlPrevious);
            }
            return \view('login');
           
        }
      
    }

    // post login
    public function PostLogin(Request $request) {
        $allRequest = $request->all();
        $checkValidate = $this->Validator($allRequest);

        $arr = ['username' => $request->username, 'password' => $request->password];
        if ($request->username != "") {
            Session::put('username', $request->username);
           
        }
        if ($checkValidate->fails()) {
            return \redirect('/Login')->withErrors($checkValidate)->withInput();
                
        } else {
            if (Auth::attempt($arr)) {
                Session::put('login_client', 'success');
                return redirect(session('url.intended'));
            } else {
        
                return redirect('/Login')->withErrors(['error_login'=>'Tài khoản hoặc mật khẩu chưa đúng!!']);
            }
        }
        
    }

    // view register
    public function Register() {
        if (Session::has('login_client')) {
            return redirect('/');
        } else {
            return view('register');
        }
        
     
    }

    // post register
    public function PostRegister(Request $request) {
        $rules = [
            'username' => 'required|email',
            'customer' => 'required',
            'address' => 'required',
            'SDT' => 'required',
            'password' => 'required|min:6',
            'confirm_password'=> 'required|min:6',
        ];

        $validatorRegister = [
            'username.required' => 'Email không được để trống',
            'username.email' => 'Không đúng địa chỉ email',
            'password.required' => 'Password không được để trống',
            'password.min' => 'Password phải có ít nhất 6 kí tự',
            'confirm_password.min' => 'Confirm_Password phải có ít nhất 6 kí tự',
            'confirm_password.required' => 'Mật khẩu xác nhận không được để trống',
            'customer.required' => 'Tên khách hàng không được để trống',
            'address.required' => 'Địa chỉ không được để trống',
            'SDT.required' => 'Số điện thoại không được để trống',
        ];

        $validator = Validator::make($request->all(), $rules, $validatorRegister);
        if ($request->username != "") {
            Session::put('email', $request->username);
        }
        if ($request->customer != "") {
            Session::put('customer', $request->customer);
           
        }
        if ($request->address != "") {
            Session::put('address', $request->address);
            
        }
        if ($request->SDT != "") {
            Session::put('SDT', $request->SDT);
           
        }

        if ($validator->fails()) {
            return \redirect('/Register')->withErrors($validator)->withInput();
        } else {
            if ($request->password != $request->confirm_password) {
                return \redirect('/Register')->withErrors(['error_pass' => 'Mật khẩu và mật khẩu xác nhận không trùng khớp']);
            } else {
                $checkusername = User::where('username', $request->username)->get();
                if (count($checkusername) > 0 ) {
                    return \redirect('/Register')->withErrors(['error_pass' => 'Email đã tồn tại!!']);
                } else {
                    $rd_code = mt_rand(10000000, 99999999);
                    Session::put('codeRegister', $rd_code);
                    $email = $request->username;
                    $data = [
                        'code' => $rd_code,
                    ];

                    Mail::send('EmailUser', $data, function ($message) use ($email) {
                        $message->from('datseto2018@gmail.com', 'Speedy');
                    
                        $message->to($email);
                    
                        $message->subject('Xác nhận Email của Speedy');
                    
                    });
                    return \redirect('/CheckMail');
                }
             
            }
        }
        
    }
    
    //check mail user
    public function CheckMailUser() {
        return view('checkMailUser');
    }

    // check code when confirm register
    public function CheckCodeUser(Request $request) {
        if (Session::has('codeRegister')) {
            if ($request->code_confirm == session('codeRegister')) {
                    User::create([
                        'username' => session('email'),
                        'password' => \bcrypt($request->password),
                        'customer' => session('customer'),
                        'address' => session('address'),
                        'SDT' => session('SDT'),
                    ]);
                    Session::forget('codeRegister');
                    Session::forget('email');
                    Session::forget('customer');
                    Session::forget('address');
                    Session::forget('SDT');
                    Session::put('register_client', 'Đăng ký tài khoản thành công!!!');
                    return redirect('/Login');
            }
            else {
                Session::put('codeFail', 'Mã xác nhận không chính xác. Vui lòng kiểm tra lại.');
                return back();
            }
        } else {
         echo "that bai";
        }
        
    }


    // logout
    public function Logout() {
        Session::forget('login_client');
        Session::forget('username');
        Session::forget('url.intended');
        return \redirect("/");
    }


    // view send mail reset pass
    public function Resetpass() {
        if (Session::has('login_client')) {
            return redirect('/');
        } else {
            return view('Send_mailpass');
        }
    }


    // post reset pass
    public function Resetpass_post(Request $request) {
        if($request->Email_resetpass != "")
        {  
            $email = $request->Email_resetpass;
            $data['IsEmail'] = User::where('username',  $email)->get();
            if ($data['IsEmail']->count() == '1') {
                foreach ($data['IsEmail'] as $key => $value) {
                   $username =  $value->username;
                }
                $data = [
                    'name' => $username,
                ];
                Mail::send('Email_Resetpass', $data, function ($message) use ($email) {
                    $message->from('datseto2018@gmail.com', 'Speedy');
                
                    $message->to($email);
                
                    $message->subject('Xác nhận Email của Speedy');
                
                });
                Session::put('notify_resetPass', "Liên kết đổi mật khẩu đã được chuyển đến email của bạn, Vui lòng kiểm tra và đổi mật khẩu");
                return redirect('/Login');
            } else {
                Session::put('err_Notemail', 'Email không tồn tại trong hệ thống!!!');
                return back();
            }
        }
        else {
            return back()->withErrors(['error_emptyEmail' => 'Vui lòng nhập email của bạn!!!']);
        }
    }


    // view input new  pass
    public function ChangePass(Request $request) {
        if (Session::has('login_client')) {
            return redirect('/');
        } else {
            return view('Resetpass');
        }
        
    }

    // post reset pass
    public function UpdatePass(Request $request) {
        $email = $request->username;
     
        $data['IsEmail'] = User::where('username',  $email)->get();

        $rules = [
            'username' => '',
            'password' => 'required|min:6',
            'confirm_password' => 'required|min:6',
        ];

        $validatorUpdatePass = [
          
            'password.required' => 'Mật khẩu không được để trống',
            'confirm_password.required' => 'Mật khẩu xác nhận không được để trống',
        ];

        $validator = Validator::make($request->all(), $rules, $validatorUpdatePass);

        if ($request->username != "") {
            Session::put('email', $request->username);
        }
        if ($request->password != "") {
            Session::put('password', $request->password);
        }
        if ($request->confirm_password != "") {
            Session::put('confirm_password', $request->confirm_password);
        }

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }else {
            if ($data['IsEmail']->count() == 1) {
                $pass = $request->password;
                $confirm_pass = $request->confirm_password;
                if ($pass != $confirm_pass) {
                    Session::put('err_pass', 'Mật khẩu và mật khẩu xác nhận không trùng khớp');
                    return back();
                } else {
                    $bcrypt_pass = bcrypt($pass);
                    User::where('username',$email)->update(['password' => $bcrypt_pass]);
                    Session::put('resetPass_success', 'Thay đổi mật khẩu thành công');
                    return redirect('/Login');
                }
            } else {
                return back()->withErrors(['err_mailExit' => 'Email không tồn tại!!!']);
            }
        }
    }

    // view thank
    public function Thank() {
        if (Session::has('schedule_success')) {
            return \view('Thank_schedule');
        } else {
            return redirect('/Login');
        }
      
    }

    // view information personal
    public function InforPersonal() {
        if (Session::has('login_client')) {
            return view('infor_personal');
        } else {
            return \redirect('/Login');
        }
    }


    // post update infor
    public function check(Request $request) {
        $email = $request->email;
        $updateCustomer = $request->customer;
        User::where('username',$email)->update(['customer' => $updateCustomer, 'SDT' => $request->sdt, 'address' => $request->address]);
        echo "success";
    }


    // view user schedule
    public function UserSchedule() {
        if (Session::has('login_client')) {
            $data['user_schedule'] = schedule::join('products', 'schedule.prod_id','=','products.prod_id')->where('email', session('username'))->orderBy('appointmentSchedule','asc')->get();
            return view('user_schedule', $data);
        } else {
            return \redirect('/Login');
        }
    }
    

    

}
