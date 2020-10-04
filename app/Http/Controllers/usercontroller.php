<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\User;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Expr\FuncCall;

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
        return Redirect('inforstudent')->with('thongbao','thêm thành công');
    }
    public function getUpdateStudent($id){
        $user= User::find($id);
        return view('admin.updatestudent',['user'=>$user]);
    }
    public function postUpdateStudent(Request $request,$id){
    
       
        $user=User::find($id);
        if($request->username!=$user->username){
          $this->validate($request,[
            'username'=>'required|unique:users,username'
        ],[
            'username.unique'=>" Tên Tài khoản đã tồn tại"
        ]);   
        }
       $user->username=$request->username;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->phone=$request->phone;
        $user->level=$request->level;
        $user->save();
        return redirect('student/update/'.$id)->with('thongbao','sua thanh cong');
    }
    public function deleteStudent($id){
        $user=User::find($id);
        $user->delete();
        return redirect('inforstudent')->with('thongbao','Bạn đã xóa thành công');
    }
    public function getUpdateProfile($id){
        $user=User::find($id);
        return view('admin.updateprofile',['user'=>$user]);
    }
}
