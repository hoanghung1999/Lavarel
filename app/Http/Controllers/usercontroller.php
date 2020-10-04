<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\User;
use Illuminate\Support\Facades\Redirect;

class usercontroller extends Controller
{
    
    public function getAuthLogin(){
        return view('login');
    } 
    public function postAuthlogin(Request $request){
        $arr=[
            'username'=> $request->username,
            'password'=>$request->password
        ];
        if(Auth::attempt($arr)){
            if(Auth::user()->level==1){
               return redirect('/admin');
           }
           else{
              return redirect('/student');
           }
        }
        else{
            return view('login');
        }
    }
    public function getalluser(){
        $user= DB::table('users')->get();
        return view('admin.inforusers',['listuser'=>$user]);
    }
    public function getDanhSachSv(){
        $user= DB::table('users')->where('level','=','0')->get();
        return view('admin.inforstudent',['listStudent'=>$user]);
    }
    public function themUser(Request $request){
        $this->validate($request,[
            'username'=>'required|unique:users,username'
        ],[
            'username.unique'=>"Tài khoản đã tồn tại"
        ]);
        $user= new User();
        $user->username=$request->username;
        $user->password=bcrypt($request->password);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->phone=$request->phone;
        $user->level=$request->level;
        $user->save();
        return Redirect('adduser')->with('thongbao','thêm thành công');
    }
    public function getUpdate($id){
        $user= User::find($id);
        echo "hello";
        return view('admin.updatestudent',['user'=>$user]);
    }
}
