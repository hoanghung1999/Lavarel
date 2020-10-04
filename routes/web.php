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

Route::get('/', function () {
    return view('welcome');
});
Route::get('login', function () {
    return view('login');
});
Route::get('authlogin','usercontroller@getAuthLogin');
Route::post('authlogin','usercontroller@postAuthLogin')->name('login');


Route::get('student',function(){
    return view('student.studentview');
});

Route::get('admin',function(){
    return view('admin.homeadminview');
});
Route::get('logout',function(){
    return view('login');
});
Route::get('inforstudent','usercontroller@getDanhSachSv')->name('inforstudent');

Route::get('inforusers','usercontroller@getalluser');
Route::get('updateprofile',function(){
    return view('admin.updateprofile');
});
Route::get('adduser',function(){
    return view('admin.adduser');
});
Route::post('adduserDB','usercontroller@themUser')->name('adduser');

Route::get('update/{id}','usercontroller@getUpdate');
Route:: post('deleteStudent/{id}','usercontroller@postUpdate');
