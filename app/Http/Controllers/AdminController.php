<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


use App\Models\User;
use App\Models\products;
use App\Models\schedule;
use App\Models\buycar;
use Session;
use Crypt;

class AdminController extends Controller
{
    // validator login
    protected function Validator(array $data) {
        return Validator::make($data,[
            'username'=>'required',
            'password'=>'required',
        ],
        [
            'username.required'=>'Email không được để trống',
            'password.required'=>'Mật khẩu không được để trống',
        ]
        );
    }

    // login admin 
    public function login(Request $request) {
        $allrequest = $request->all();
        $validate = $this->Validator($allrequest);
        $arr = ['username' => ''.$request->username, 'password' => ''.$request->password];
       
        if ($validate->fails()) {
            return redirect('/Admin/Login')->withErrors($validate)->withInput();
        } else {
     
            if (Auth::attempt($arr)) {
                Session::put('success_login','thanh cong');
                echo "thanh cong ";
               return redirect('/Admin/Manager');
            } else { 
                return redirect('/Admin/Login')->withErrors(['error_login'=>'Tài khoản hoặc mật khẩu chưa đúng!!']);
            }
            
        }
       
    }

    // logout admin
    public function logout() {
        Session::forget('success_login');
        return redirect('/Admin/Login');
    }

    // public function register() {
    //     User::create([
    //         'username' =>"datnguyen1",
    //         'password' =>bcrypt("dat123"),
    //     ]);
    // }
    

    // output view admin manager
    
    public function Manager() {
        if (Session::has('success_login')) {
            $data['schedule'] = schedule::where('status', 'chua den hen')->orderBy('appointmentSchedule','asc')->paginate(5);
            $data['count_completeSchedule'] = schedule::where('status', 'da lai thu')->count();
            $data['count_slackingSchedule'] = schedule::where('status', 'chua den hen')->count();
            $data['count_cancel'] = schedule::where('status', 'huy')->count();
            $data['count_schedule'] = schedule::get()->count();

            return view('admin_Manager', $data);
        } else {
            return redirect('/Admin/Login');
        }
    }

    public function ScheduleComplete() {
        if (Session::has('success_login')) {
            $data['schedule'] = schedule::where('status','da lai thu')->paginate(5);
            $data['count_completeSchedule'] = schedule::where('status', 'da lai thu')->count();
            $data['count_slackingSchedule'] = schedule::where('status', 'chua den hen')->count();
            $data['count_cancel'] = schedule::where('status', 'huy')->count();
            $data['count_schedule'] = schedule::get()->count();
            return view('admin_ScheduleComplete', $data);
        } else {
            return redirect('/Admin/Login');
        }
        
    }

    public function ScheduleCancel(){
        if (Session::has('success_login')) {
            $data['schedule'] = schedule::where('status','huy')->paginate(5);
            $data['count_completeSchedule'] = schedule::where('status', 'da lai thu')->count();
            $data['count_slackingSchedule'] = schedule::where('status', 'chua den hen')->count();
            $data['count_cancel'] = schedule::where('status', 'huy')->count();
            $data['count_schedule'] = schedule::get()->count();
            return view('admin_ScheduleCancel', $data);
        } else {
            return redirect('/Admin/Login');
        }
    }


    // output view add car
    public function getAddCar(Request $request) {
        if (Session::has('success_login')) {
            return view('Add_Car');
        } else {
            return redirect('/Admin/Login');
        }
    }

    // add car into database
    public function AddCar(Request $request) {
       
        $Car_name = $request->tensp;
        $Car_piece = $request->giasp;
        $Car_DRC = $request->DRC;
        $Car_weight = $request->weight;
        $Car_engine = $request->engine;
        $Car_Horsepower = $request->Horsepower;
        $Car_maxCapacity = $request->maxCapacity;
        $Car_MaxTorque = $request->MaxTorque;
        $Car_Acceleration = $request->Acceleration;
        $Car_MaxSpeed = $request->MaxSpeed;
        $Car_TypeOfFuel = $request->TypeOfFuel;
        $Car_City = $request->City;
        $Car_Local = $request->Local;
        $Car_Combine = $request->Combine;
        $Car_description = $request->mieuta;
        if ($request->hasFile('photo')) {
            $file = $request->photo;
            $fileExtention =  $file->getClientOriginalExtension();
            $namefile =  $file->getClientOriginalName();

           
            if (file_exists(base_path("public\image\\").$namefile) ) {
                echo "file da ton tai";
            }else {
               
                if ($fileExtention == 'jpg' || $fileExtention == 'png') {
                    $file->move(base_path('public\image') ,$namefile);
                } else {
                    echo "khong dung dinh dang file";
                }
            }

           
        } else {
            echo "khong co file";
        }
        
        
     
        $color = $request->color;
        $amount = $request->soluong;

        products::create([
            'prod_name'=> $Car_name, 'prod_cost' => $Car_piece,'prod_img' => $namefile, 'prod_description'=>$Car_description,'prod_DRC'=>$Car_DRC,'prod_Weight'=> $Car_weight ,'prod_Engine'=> $Car_engine ,'prod_HorsePower'=> $Car_Horsepower ,'prod_MaxCapacity'=>$Car_maxCapacity,'prod_MaxTorque'=> $Car_MaxTorque ,'prod_Acceleration'=>$Car_Acceleration ,'prod_MaxSpeed'=>$Car_MaxSpeed,'prod_TypeOfFuel'=> $Car_TypeOfFuel,'prod_City'=> $Car_City ,'prod_Combine'=>$Car_Combine,'prod_Local'=> $Car_Local, 'color' => $color, 'amount' => $amount,
        ]);
            

        return \redirect("/Admin/ManagerCar")->with('add_success', 'Thêm xe thành công');
       
    }

    // output view Admin manager
    public function ManagerCar() {
        if (Session::has('success_login')) {
            $data['products'] = products::get();
            $data['carCount'] = products::get()->count();
            return view('Admin_ManagerCar',$data);
        } else {
            return redirect('/Admin/Login');
        }
    }

    //information car
    public function CarInfor(Request $request) {
        $Car_id = $request->prod_id;
        $data['productDetail'] = products::where('prod_id',$Car_id)->get();
        echo json_encode($data['productDetail']);
    }

    //update car
    public function CarUpdate(Request $request) {
        $Car_id = $request->id;
        products::where('prod_id', $Car_id)->update(['prod_name'=> $request->update_name,'prod_cost'=>$request->update_gia,'prod_DRC'=>$request->update_DRC,'prod_Weight'=>$request->update_weight,'prod_Engine'=>$request->update_Engine,'prod_HorsePower'=>$request->update_HorsePower,'prod_MaxCapacity'=>$request->update_MaxCapacity,'prod_MaxTorque'=>$request->update_MaxTorque,'prod_Acceleration'=>$request->update_Acceleration,'prod_MaxSpeed'=>$request->update_MaxSpeed,'prod_TypeOfFuel'=>$request->update_TypeOfFuel,'prod_City'=>$request->update_city,'prod_Local'=>$request->update_local,'prod_Combine'=>$request->update_combine]);
        echo 'success';
    }

    //delete car
    public function CarDelete(Request $request) {
      
        if (file_exists(base_path("public\image\\").$request->prod_img)) {
            products::where('prod_id',$request->prod_id)->delete();
            unlink( base_path('public\image\\'.$request->prod_img));
            echo "success";
        } else {
            echo "error";
        }
        
       
    }

    // information car schedule
    public function CarInforSchedule(Request $request) {
        $data['CarInforSchedule'] =  schedule::join('products', 'schedule.prod_id','=','products.prod_id')->select('products.prod_name', 'products.prod_img','products.prod_cost')->where('products.prod_id',$request->id)->where('schedule.email', $request->email )->get();
        echo json_encode($data['CarInforSchedule']);
    }


    //thống kê 
    public function CarSales() {
        //chua lai thu va mua xe
        $data['Nodrive_CarSale'] =  schedule::join('useradmin','schedule.email','useradmin.username')->whereExists(function($query)
        {
            $query->select('email', 'prod_id')
                  ->from('buycar')
                  ->whereRaw('buycar.email = schedule.email AND buycar.IsBuy = "mua" AND buycar.prod_id = schedule.prod_id AND schedule.status = "chua den hen"
                  AND schedule.appointmentSchedule = buycar.appointmentSchedule ');
        })
        ->orderBy('appointmentSchedule','asc')->get();

        //da lai thu va mua xe
    
        $data['Drive_CarSale'] = schedule::join('useradmin','schedule.email','useradmin.username')->join('buycar', 'schedule.appointmentSchedule',"=", 'buycar.appointmentSchedule')->whereRaw('buycar.email = schedule.email AND buycar.IsBuy = "mua" AND schedule.appointmentSchedule = buycar.appointmentSchedule AND buycar.prod_id = schedule.prod_id  AND schedule.status = "da lai thu"')->select('useradmin.customer','schedule.email','useradmin.SDT','schedule.appointmentSchedule','buycar.BuyDate', 'buycar.prod_id')->get();

        
        // chua lai thu va chua mua xe
        $data['Nodrive_NoCarSale'] = schedule::whereNotExists(function($query){
            $query->from('buycar')->whereRaw('buycar.email = schedule.email AND buycar.appointmentSchedule = schedule.appointmentSchedule AND buycar.prod_id = schedule.prod_id OR schedule.status = "huy" OR schedule.status = "da lai thu" ');
        })->get();
         //da lai thu va chua mua xe
         $data['Drive_NoCarSale'] =  schedule::whereNotExists(function($query)
         {
             $query
                 ->from('buycar')
                 ->whereRaw(' schedule.appointmentSchedule = buycar.appointmentSchedule and schedule.prod_id = buycar.prod_id and schedule.email = buycar.email OR schedule.status = "huy"  OR schedule.status = "chua den hen" ');
         })
         ->orderBy('appointmentSchedule','asc')->get();
        
         // khong dat lich  lai thu va mua xe
        
        $data['Notschedule_Carsale'] = buycar::whereNotExists(function($query){
            $query->from('schedule')->whereRaw('buycar.email = schedule.email AND buycar.appointmentSchedule = schedule.appointmentSchedule AND buycar.prod_id = schedule.prod_id');
        })->get();

        $data['count_Nodrive_CarSale'] = \count($data['Nodrive_CarSale']);
        $data['count_drive_CarSale'] = \count($data['Drive_CarSale']);
        $data['count_Nodrive_NoCarSale'] = \count($data['Nodrive_NoCarSale']);
        $data['count_Drive_NoCarSale'] = \count($data['Drive_NoCarSale']);
        $data['count_Notschedule_CarSale'] = \count($data['Notschedule_Carsale']);

        return \view('admin_buycar',$data);
    }

    public function Drive_NoCarSale() {
        //chua lai thu va mua xe
        $data['Nodrive_CarSale'] =  schedule::whereExists(function($query)
            {
                $query->select('email', 'prod_id')
                      ->from('buycar')
                      ->whereRaw('buycar.email = schedule.email AND buycar.IsBuy = "mua" AND buycar.prod_id = schedule.prod_id AND schedule.status = "chua den hen"
                      AND schedule.appointmentSchedule = buycar.appointmentSchedule ');
            })
            ->orderBy('appointmentSchedule','asc')->get();
        //da lai thu va mua xe
        $data['Drive_CarSale'] = schedule::join('useradmin','schedule.email','useradmin.username')->join('buycar', 'schedule.appointmentSchedule',"=", 'buycar.appointmentSchedule')->whereRaw('buycar.email = schedule.email AND buycar.IsBuy = "mua" AND schedule.appointmentSchedule = buycar.appointmentSchedule AND buycar.prod_id = schedule.prod_id  AND schedule.status = "da lai thu"')->select('useradmin.customer','schedule.email','useradmin.SDT','schedule.appointmentSchedule','buycar.BuyDate', 'buycar.prod_id')->get();

      
        // chua lai thu va chua mua xe
        $data['Nodrive_NoCarSale'] = schedule::whereNotExists(function($query){
            $query->from('buycar')->whereRaw('buycar.email = schedule.email AND buycar.appointmentSchedule = schedule.appointmentSchedule AND buycar.prod_id = schedule.prod_id OR schedule.status = "huy" OR schedule.status = "da lai thu" ');
        })->get();

         //da lai thu va chua mua xe
         $data['Drive_NoCarSale'] =  schedule::whereNotExists(function($query)
         {
             $query
                 ->from('buycar')
                 ->whereRaw(' schedule.appointmentSchedule = buycar.appointmentSchedule and schedule.prod_id = buycar.prod_id and schedule.email = buycar.email OR schedule.status = "huy"  OR schedule.status = "chua den hen" ');
         })
         ->orderBy('appointmentSchedule','asc')->get();
     
    
        $data['Notschedule_Carsale'] = buycar::whereNotExists(function($query){
            $query->from('schedule')->whereRaw('buycar.email = schedule.email AND buycar.appointmentSchedule = schedule.appointmentSchedule AND buycar.prod_id = schedule.prod_id');
        })->get();

        $data['count_Nodrive_CarSale'] = \count($data['Nodrive_CarSale']);
        $data['count_drive_CarSale'] = \count($data['Drive_CarSale']);
        $data['count_Nodrive_NoCarSale'] = \count($data['Nodrive_NoCarSale']);
        $data['count_Drive_NoCarSale'] = \count($data['Drive_NoCarSale']);
        $data['count_Notschedule_CarSale'] = \count($data['Notschedule_Carsale']);
        return \view('admin_Drive_NoCarSale',$data);
    }


    public function Nodrive_NoCarSale() {
        //chua lai thu va mua xe
        $data['Nodrive_CarSale'] =  schedule::whereExists(function($query)
        {
            $query->select('email', 'prod_id')
                  ->from('buycar')
                  ->whereRaw('buycar.email = schedule.email AND buycar.IsBuy = "mua" AND buycar.prod_id = schedule.prod_id AND schedule.status = "chua den hen"
                  AND schedule.appointmentSchedule = buycar.appointmentSchedule ');
        })
        ->orderBy('appointmentSchedule','asc')->get();

        //da lai thu va mua xe
        $data['Drive_CarSale'] = schedule::join('useradmin','schedule.email','useradmin.username')->join('buycar', 'schedule.appointmentSchedule',"=", 'buycar.appointmentSchedule')->whereRaw('buycar.email = schedule.email AND buycar.IsBuy = "mua" AND schedule.appointmentSchedule = buycar.appointmentSchedule AND buycar.prod_id = schedule.prod_id  AND schedule.status = "da lai thu"')->select('useradmin.customer','schedule.email','useradmin.SDT','schedule.appointmentSchedule','buycar.BuyDate', 'buycar.prod_id')->get();

      
        // chua lai thu va chua mua xe
       

        $data['Nodrive_NoCarSale'] = schedule::whereNotExists(function($query){
            $query->from('buycar')->whereRaw('buycar.email = schedule.email AND buycar.appointmentSchedule = schedule.appointmentSchedule AND buycar.prod_id = schedule.prod_id OR schedule.status = "huy" OR schedule.status = "da lai thu" ');
        })->get();
         //da lai thu va chua mua xe
         $data['Drive_NoCarSale'] =  schedule::whereNotExists(function($query)
         {
             $query
                 ->from('buycar')
                 ->whereRaw(' schedule.appointmentSchedule = buycar.appointmentSchedule and schedule.prod_id = buycar.prod_id and schedule.email = buycar.email OR schedule.status = "huy"  OR schedule.status = "chua den hen" ');
         })
         ->orderBy('appointmentSchedule','asc')->get();

        $data['Notschedule_Carsale'] = buycar::whereNotExists(function($query){
            $query->from('schedule')->whereRaw('buycar.email = schedule.email AND buycar.appointmentSchedule = schedule.appointmentSchedule AND buycar.prod_id = schedule.prod_id');
        })->get();

        $data['count_Nodrive_CarSale'] = \count($data['Nodrive_CarSale']);
        $data['count_drive_CarSale'] = \count($data['Drive_CarSale']);
        $data['count_Nodrive_NoCarSale'] = \count($data['Nodrive_NoCarSale']);
        $data['count_Drive_NoCarSale'] = \count($data['Drive_NoCarSale']);
        $data['count_Notschedule_CarSale'] = \count($data['Notschedule_Carsale']);
        return \view('admin_Nodrive_NoCarSale',$data);
    }

    

    public function Nodrive_CarSale() {
        //chua lai thu va mua xe
        

        $data['Nodrive_CarSale'] = schedule::join('useradmin','schedule.email','useradmin.username')->join('buycar', 'schedule.appointmentSchedule',"=", 'buycar.appointmentSchedule')->whereRaw('buycar.email = schedule.email AND buycar.IsBuy = "mua" AND buycar.prod_id = schedule.prod_id AND schedule.status = "chua den hen"
        AND schedule.appointmentSchedule = buycar.appointmentSchedule')->select('useradmin.customer','schedule.email','useradmin.SDT','schedule.appointmentSchedule','buycar.BuyDate', 'buycar.prod_id')->get();

        

        //da lai thu va mua xe
        $data['Drive_CarSale'] = schedule::join('useradmin','schedule.email','useradmin.username')->join('buycar', 'schedule.appointmentSchedule',"=", 'buycar.appointmentSchedule')->whereRaw('buycar.email = schedule.email AND buycar.IsBuy = "mua" AND schedule.appointmentSchedule = buycar.appointmentSchedule AND buycar.prod_id = schedule.prod_id  AND schedule.status = "da lai thu"')->select('useradmin.customer','schedule.email','useradmin.SDT','schedule.appointmentSchedule','buycar.BuyDate', 'buycar.prod_id')->get();

      
        // chua lai thu va chua mua xe
        $data['Nodrive_NoCarSale'] = schedule::whereNotExists(function($query){
            $query->from('buycar')->whereRaw('buycar.email = schedule.email AND buycar.appointmentSchedule = schedule.appointmentSchedule AND buycar.prod_id = schedule.prod_id OR schedule.status = "huy" OR schedule.status = "da lai thu" ');
        })->get();
         //da lai thu va chua mua xe
         $data['Drive_NoCarSale'] =  schedule::whereNotExists(function($query)
         {
             $query
                 ->from('buycar')
                 ->whereRaw(' schedule.appointmentSchedule = buycar.appointmentSchedule and schedule.prod_id = buycar.prod_id and schedule.email = buycar.email OR schedule.status = "huy"  OR schedule.status = "chua den hen" ');
         })
         ->orderBy('appointmentSchedule','asc')->get();


        

         $data['Notschedule_Carsale'] = buycar::whereNotExists(function($query){
            $query->from('schedule')->whereRaw('buycar.email = schedule.email AND buycar.appointmentSchedule = schedule.appointmentSchedule AND buycar.prod_id = schedule.prod_id');
        })->get();

        $data['count_Nodrive_CarSale'] = \count($data['Nodrive_CarSale']);
        $data['count_drive_CarSale'] = \count($data['Drive_CarSale']);
        $data['count_Nodrive_NoCarSale'] = \count($data['Nodrive_NoCarSale']);
        $data['count_Drive_NoCarSale'] = \count($data['Drive_NoCarSale']);
        $data['count_Notschedule_CarSale'] = \count($data['Notschedule_Carsale']);
        return \view('admin_Nodrive_CarSale',$data);
    }

    public function NotSchedule() {
        //chua lai thu va mua xe
        $data['Nodrive_CarSale'] =  schedule::whereExists(function($query)
        {
            $query->select('email', 'prod_id')
                  ->from('buycar')
                  ->whereRaw('buycar.email = schedule.email AND buycar.IsBuy = "mua" AND buycar.prod_id = schedule.prod_id AND schedule.status = "chua den hen"
                  AND schedule.appointmentSchedule = buycar.appointmentSchedule ');
        })
        ->orderBy('appointmentSchedule','asc')->get();

        //da lai thu va mua xe
    
        $data['Drive_CarSale'] = schedule::join('useradmin','schedule.email','useradmin.username')->join('buycar', 'schedule.appointmentSchedule',"=", 'buycar.appointmentSchedule')->whereRaw('buycar.email = schedule.email AND buycar.IsBuy = "mua" AND schedule.appointmentSchedule = buycar.appointmentSchedule AND buycar.prod_id = schedule.prod_id  AND schedule.status = "da lai thu"')->select('useradmin.customer','schedule.email','useradmin.SDT','schedule.appointmentSchedule','buycar.BuyDate', 'buycar.prod_id')->get();
        // chua lai thu va chua mua xe
        $data['Nodrive_NoCarSale'] = schedule::whereNotExists(function($query){
            $query->from('buycar')->whereRaw('buycar.email = schedule.email AND buycar.appointmentSchedule = schedule.appointmentSchedule AND buycar.prod_id = schedule.prod_id OR schedule.status = "huy" OR schedule.status = "da lai thu" ');
        })->get();
         //da lai thu va chua mua xe
         $data['Drive_NoCarSale'] =  schedule::whereNotExists(function($query)
         {
             $query
                 ->from('buycar')
                 ->whereRaw(' schedule.appointmentSchedule = buycar.appointmentSchedule and schedule.prod_id = buycar.prod_id and schedule.email = buycar.email OR schedule.status = "huy"  OR schedule.status = "chua den hen" ');
         })
         ->orderBy('appointmentSchedule','asc')->get();
        
         // khong dat lich  lai thu va mua xe
        
        $data['Notschedule_Carsale'] = buycar::join('useradmin','buycar.email','useradmin.username')->whereNotExists(function($query){
            $query->from('schedule')->whereRaw('buycar.email = schedule.email AND buycar.appointmentSchedule = schedule.appointmentSchedule AND buycar.prod_id = schedule.prod_id');
        })->select('useradmin.customer','useradmin.SDT','buycar.email','buycar.BuyDate', 'buycar.prod_id')->get();

        $data['count_Nodrive_CarSale'] = \count($data['Nodrive_CarSale']);
        $data['count_drive_CarSale'] = \count($data['Drive_CarSale']);
        $data['count_Nodrive_NoCarSale'] = \count($data['Nodrive_NoCarSale']);
        $data['count_Drive_NoCarSale'] = \count($data['Drive_NoCarSale']);
        $data['count_Notschedule_CarSale'] = \count($data['Notschedule_Carsale']);

        return \view('admin_NotScheduleCar',$data);
    }


    public function CompleteSchedule(Request $request) {
        $email =  $request->json('email');
        $id =  $request->json('id');
        $appointmentSchedule = $request->json('appointmentSchedule');
        $data['Is_status'] =  schedule::where('email', $email)->where('prod_id', $id)->where('appointmentSchedule', $appointmentSchedule)->where('status', 'da lai thu')->get();
        if ($data['Is_status']->count() == 1) {
            echo "error";
        } else {
            schedule::where('email',$email)->where('prod_id', $id)->where('appointmentSchedule', $appointmentSchedule)->update(['status' => 'da lai thu']);
            echo "success";
        }
       
    }

    public function CancelSchedule(Request $request) {
        $email = $request->json('email');
        $id = $request->json('id');
        $appointmentSchedule =$request->json('appointmentSchedule');
        schedule::where('email', $email)->where('prod_id', $id)->where('appointmentSchedule', $appointmentSchedule)->update(['status' => 'huy']);
        echo "success";
    }

    public function ManagerUser() {
        $data['allUser'] = User::where('username', '<>','datnguyen1')->get();
        $data['countUser'] = User::where('username', '<>', 'datnguyen1')->count();
       
        return view('Admin_ManagerUser', $data);
    }

    public function PostManagerUser(Request $request) {
        $data['getScheduleUser'] = schedule::join('products', 'schedule.prod_id','=','products.prod_id')->select('email','prod_name','appointmentSchedule','status')->where('email', $request->json('email'))->orderBy('appointmentSchedule', 'asc')->get();
        echo json_encode($data['getScheduleUser']);
    }

    public function PostListBuyCar(Request $request) {
        $data['ListBuyCar'] = buycar::join('products','buycar.prod_id','=','products.prod_id')->select('prod_name','BuyDate','appointmentSchedule')->where('email', $request->json('email'))->get();
        echo json_encode($data['ListBuyCar']);
    }

    public function AddBill() {
        return view('admin_bill');
    }

    public function addDataBill(Request $request) {
        buycar::insert([
            'prod_id' => $request->nameCar,
            'email' => $request->user,
            'appointmentSchedule' => $request->dateSchedule,
            'BuyDate' => $request->dateBuy
        ]);
        
        echo 'success';
    }

    public function ListBuyCar() {
        $data['listBuyCar'] = buycar::join('useradmin','buycar.email','useradmin.username')->join('products','buycar.prod_id','products.prod_id')->orderBy('BuyDate','desc')->get();
        $data['countListBuyCar'] = $data['listBuyCar']->count();
        $data['doanhthu'] = 0;
        foreach ($data['listBuyCar'] as $key => $value) {
            $data['doanhthu'] = $data['doanhthu'] + $value->prod_cost;
        }
        return  view('admin_ListBuyCar', $data);
    }
}