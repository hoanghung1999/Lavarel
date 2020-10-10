<?php

use App\Http\Controllers\usercontroller;
use App\message;
use App\task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Expr\FuncCall;

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


Route::get('authlogin', 'usercontroller@getAuthLogin');
Route::post('authlogin', 'usercontroller@postAuthLogin')->name('login');


Route::get('student', function () {
    return view('student.homestudentview');
})->name('studenthome');

Route::get('admin', function () {
    return view('admin.homeadminview');
})->name('adminhome');
Route::get('student', function () {
    return view('student.homestudentview');
})->name('studenthome');

Route::get('messages','usercontroller@getlistmessS')->name('messageStudent');
Route::get('messagesA','usercontroller@getlistmessA')->name('messageAdmin');
Route::get('logout', function () {
    return view('login');
})->name('logout');
//admin list student
Route::get('inforstudent', 'usercontroller@getDanhSachSv')->name('inforstudent');
//admin list user
Route::get('inforusers', 'usercontroller@getalluser')->name('inforuser');
//admin update profile
Route::get('updateprofile/{id}', 'usercontroller@getUpdateProfile')->name('getUpdateprofile');
Route::post('updateprofile/{id}', 'usercontroller@postUpdateProfile')->name('postUpdateProfile');
//admin get view add user in system
Route::get('getadduser', function () {
    return view('admin.adduser');
})->name('getadduser');
//admin insert new user in system
Route::post('postadduser', 'usercontroller@themUser')->name('postadduser');
// admin get form update profile
Route::get('student/update/{id}', 'usercontroller@getUpdateStudent');
// admin update profile in DB
Route::post('student/update/{id}', 'usercontroller@postUpdateStudent')->name('postUpdateStudent');
// admin delete student in system
Route::get('student/delete/{id}', 'usercontroller@deleteStudent');
//admin givetask getview
Route::get('givetask', 'usercontroller@getListTaskadmin')->name('givetask');

//admin upload file
Route::post('postgivetask', 'usercontroller@postGiveTask')->name('postgivetask');
//admin watch list task submit
Route::get('listsubmittask/{id}','usercontroller@getListSubmitTask')->name('listsubmittask');


//User
// Student list user
Route::get('inforusersforstudent', 'usercontroller@getAllUserForStudent')->name('inforuserforstudent');
//Student update profile
Route::get('updateprofileforstudent/{id}', 'usercontroller@getUpdateProfileForStudent')->name('getUpdateProfileForStudent');
Route::post('updateprofileforstudent/{id}', 'usercontroller@postUpdateProfileForStudent')->name('postUpdateProfileForStudent');
//student get all list task
Route::get('recievetask', 'usercontroller@getListTaskStudent')->name('recievetask');
//admin and user
//get infor user for admin
Route::get("admin/userdetail/{id}",'usercontroller@inforUserA')->name('inforUserDetailforAdmin');
Route::get("student/userdetail/{id}",'usercontroller@inforUserS')->name('inforUserDetailforStudent');

// student submit task 
Route::post("submittask/{id}",'usercontroller@submitTask')->name('submittask');
//get file from student submit task
Route::get("/{link}",function(){})->name('getfile');
//get message detail for student
Route::get("messagedetail/{id}",'usercontroller@getMessDetailS')->name("getmessdetailS");
Route::get("messagedetailA/{id}",'usercontroller@getMessDetailA')->name("getmessdetailA");
//message
Route::post('sentmess/{id}','usercontroller@postmessS')->name('postmess');
Route::post('sentmessA/{id}','usercontroller@postmessA')->name('postmessA');

Route::get("deletemessA/{id}/{idto}","usercontroller@deleteMessA")->name("deleteMessA");
Route::get("deletemessS/{id}/{idto}","usercontroller@deleteMessS")->name("deleteMessS");

