<?php

use App\Http\Controllers\usercontroller;
use Illuminate\Support\Facades\Route;

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


Route::get('authlogin','usercontroller@getAuthLogin');
Route::post('authlogin','usercontroller@postAuthLogin')->name('login');


Route::get('student',function(){
    return view('student.studentview');
})->name('studenthome');

Route::get('admin',function(){
    return view('admin.homeadminview');
})->name('adminhome');
Route::get('logout',function(){
    return view('login');
})->name('logout');
Route::get('inforstudent','usercontroller@getDanhSachSv')->name('inforstudent');

Route::get('inforusers','usercontroller@getalluser')->name('inforuser');
Route::get('updateprofile/{id}','usercontroller@getUpdateProfile')->name('getUpdateprofile');
Route::get('getadduser',function(){
    return view('admin.adduser');
})->name('getadduser');
Route::post('postadduser','usercontroller@themUser')->name('postadduser');

Route::get('student/update/{id}','usercontroller@getUpdateStudent');
Route::post('student/update/{id}','usercontroller@postUpdateStudent')->name('postUpdateStudent');

Route:: get('student/delete/{id}','usercontroller@deleteStudent');
