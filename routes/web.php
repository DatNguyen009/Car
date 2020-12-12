<?php
use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::get('/', 'App\Http\Controllers\CarController@Home');

Route::get('/Home', 'App\Http\Controllers\CarController@Home');

Route::get('/detail/{id}', 'App\Http\Controllers\CarController@CarDetail');

Route::get('/contact', function () {
    return view('contact');
});


Route::get('/service', function () {
    return view('service');
});


Route::get('/shop', 'App\Http\Controllers\CarController@CarDetail_Shop');

Route::get('/shedule/{id}', 'App\Http\Controllers\CarController@Schedule');
Route::post('/PostSchedule', 'App\Http\Controllers\CarController@PostSchedule')->name('PostSchedule');

Route::get('/Search', ['as' => 'Search', 'uses' => 'App\Http\Controllers\CarController@search']);

Route::get('filtermintomax', 'App\Http\Controllers\CarController@filtermintomax')->name('filtermintomax');
Route::get('filtermaxtomin', 'App\Http\Controllers\CarController@filtermaxtomin')->name('filtermaxtomin');

Route::group(['prefix' => 'Admin'], function () {
    // Route::get('/register','App\Http\Controllers\AdminController@register');
    Route::get('Login', function () {
        return view('Admin_login');
    });
    Route::post('Login', 'App\Http\Controllers\AdminController@login')->name('Login');
    Route::get('logout', 'App\Http\Controllers\AdminController@logout')->name('logout');
    Route::get('Manager', 'App\Http\Controllers\AdminController@Manager');
    Route::get('ScheduleComplete', 'App\Http\Controllers\AdminController@ScheduleComplete');
    Route::get('ScheduleCancel', 'App\Http\Controllers\AdminController@ScheduleCancel');
    Route::post('CompleteSchedule', 'App\Http\Controllers\AdminController@CompleteSchedule')->name('CompleteSchedule');
    Route::post('CancelSchedule', 'App\Http\Controllers\AdminController@CancelSchedule')->name('CancelSchedule');
    Route::get('AddCar', 'App\Http\Controllers\AdminController@getAddCar');
    Route::post('AddCar', 'App\Http\Controllers\AdminController@AddCar')->name('AddCar');
    Route::get('ManagerCar', 'App\Http\Controllers\AdminController@ManagerCar');
    Route::post('ManagerCar', 'App\Http\Controllers\AdminController@CarInfor')->name('carInfor.post');
    Route::post('ManagerCar1', 'App\Http\Controllers\AdminController@CarUpdate')->name('carUpdate.post');
    Route::post('ManagerCar2', 'App\Http\Controllers\AdminController@CarDelete')->name('CarDelete.post');
    Route::post('ManagerCarInfor', 'App\Http\Controllers\AdminController@CarInforSchedule')->name('carinfor');
    Route::get('CarSales', 'App\Http\Controllers\AdminController@CarSales');
    Route::get('DriveNoCarSale', 'App\Http\Controllers\AdminController@Drive_NoCarSale');
    Route::get('NodriveNoCarSale', 'App\Http\Controllers\AdminController@Nodrive_NoCarSale');
    Route::get('NodriveCarSale', 'App\Http\Controllers\AdminController@Nodrive_CarSale' );
    Route::get('ManagerUser', 'App\Http\controllers\AdminController@ManagerUser');
    Route::post('ManagerUser',  'App\Http\controllers\AdminController@PostManagerUser')->name('PostManagerUser');
    Route::post('ListBuyCar',  'App\Http\controllers\AdminController@PostListBuyCar')->name('PostListBuyCar');
    Route::get('NotScheduleCar', 'App\Http\controllers\AdminController@NotSchedule');
    Route::get('AddBill', 'App\Http\controllers\AdminController@AddBill');
    Route::post('/addBill', 'App\Http\Controllers\AdminController@addDataBill')->name('addDataBill');
    Route::get('/ListBuyCar', 'App\Http\controllers\AdminController@ListBuyCar');
});


Route::post('VerifyEmail', 'App\Http\Controllers\CarController@VerifyEmail')->name('VerifyEmail');


Route::get('/mail', function () {   
    return view('VerifyEmail');
});


Route::get('/Login', 'App\Http\Controllers\CarController@Login');
Route::post('/Login', 'App\Http\Controllers\CarController@PostLogin')->name('PostLogin');

Route::get('/Register', 'App\Http\Controllers\CarController@Register');
Route::post('/Register', 'App\Http\Controllers\CarController@PostRegister')->name('PostRegister');

Route::get('/Logout', 'App\Http\Controllers\CarController@Logout');
Route::get('/Thank', 'App\Http\Controllers\CarController@Thank');

Route::get('/CheckMail', 'App\Http\Controllers\CarController@CheckMailUser' );
Route::post('/CheckMailUser', 'App\Http\Controllers\CarController@CheckCodeUser')->name('Checkmail.User');
Route::get('/Resetpass', 'App\Http\Controllers\CarController@Resetpass');
Route::post('/Resetpass', 'App\Http\Controllers\CarController@Resetpass_post')->name('ResetPass.post');

Route::get('/Newpass', 'App\Http\Controllers\CarController@ChangePass');
Route::post('/Newpass', 'App\Http\Controllers\Carcontroller@UpdatePass')->name('UpdatePass.post');

Route::get('/InforPersonal', 'App\Http\Controllers\Carcontroller@InforPersonal');
Route::get('/UserSchedule', 'App\Http\Controllers\Carcontroller@UserSchedule');

Route::post('/check', 'App\Http\Controllers\Carcontroller@check')->name('check');


Route::apiResource('/api', 'App\Http\Controllers\Api\ProductController');
Route::apiResource('/api/user', 'App\Http\Controllers\Api\UserApi');


