<?php

namespace App\Http\Controllers;

use App\chatmessage;
use App\message as AppMessage;
use App\subtask;
use App\task;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\User;
use GuzzleHttp\Psr7\Message;
use Illuminate\Mail\Events\MessageSent;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Expr\FuncCall;

class usercontroller extends Controller
{
    //admin
    public function getAuthLogin()
    {
        return view('login');
    }
    public function postAuthlogin(Request $request)
    {
        $arr = [
            'username' => $request->username,
            'password' => $request->password
        ];
        if (Auth::attempt($arr)) {
            if (Auth::user()->level == 1) {
                return redirect('/admin');
            } else {
                return redirect('/student');
            }
        } else {
            return view('login');
        }
    }
    public function getalluser()
    {
        $user = DB::table('users')->get();
        return view('admin.inforusers', ['listuser' => $user]);
    }
    public function getDanhSachSv()
    {
        $user = DB::table('users')->where('level', '=', '0')->get();
        return view('admin.inforstudent', ['listStudent' => $user]);
    }
    public function themUser(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|unique:users,username'
        ], [
            'username.unique' => "Tài khoản đã tồn tại"
        ]);
        $user = new User();
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->level = $request->level;
        $user->save();
        return Redirect('inforstudent')->with('thongbao', 'thêm thành công');
    }
    public function getUpdateStudent($id)
    {
        $user = User::find($id);
        return view('admin.updatestudent', ['user' => $user]);
    }
    public function postUpdateStudent(Request $request, $id)
    {


        $user = User::find($id);
        if ($request->username != $user->username) {
            $this->validate($request, [
                'username' => 'required|unique:users,username'
            ], [
                'username.unique' => " Tên Tài khoản đã tồn tại"
            ]);
        }
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->level = $request->level;
        $user->save();
        return redirect('student/update/' . $id)->with('thongbao', 'sua thanh cong');
    }
    public function deleteStudent($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('inforstudent')->with('thongbao', 'Bạn đã xóa thành công');
    }
    public function getUpdateProfile($id)
    {
        $user = User::find($id);
        return view('admin.updateprofile', ['user' => $user]);
    }
    public function postUpdateProfile(Request $request, $id)
    {
        $user = User::find($id);
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if ($request->changepassword == "on") {
            $this->validate($request, ['password' => 'required'], ['password.required' => "Bạn chưa nhập mật khẩu"]);
            $user->password = bcrypt($request->password);
        }
        $user->save();
        return Redirect('updateprofile/' . $id)->with('thongbao', "cập nhật thông tin thành công");
    }

    //admin give task
    public function postGiveTask(Request $request)
    {

        if ($request->hasFile('task')) {

            $this->validate(
                $request,
                [
                    'title' => 'required',
                    'sdate' => 'required',
                    'edate' => 'required'
                ],
                [
                    'title.required' => "Bạn chưa nhập tiêu đề",
                    'sdate.required' => "Bạn chưa nhập ngày bắt đầu",
                    'edate.required' => "Bạn chưa nhập ngày kết thúc"
                ]
            );
            $task = new task();
            $file = $request->file('task');
            $filename = $file->getClientOriginalName('task');
            $file->move('task', $filename);
            $task->link = "task/" . $filename;
            $task->ngaybatdau = $request->sdate;
            $task->ngayketthuc = $request->edate;
            $task->tieude = $request->title;
            $task->save();
            return redirect('givetask')->with('thongbao', "Thêm bài tập thành công");
        }
        return redirect('givetask');
    }
    //show list submit task for admin
    public function getListSubmitTask($id){
        $listsubmittask=DB::table('subtask')->join('users','subtask.idsv','users.id')->where('subtask.idtask',$id)->select('users.name','users.email','subtask.time','subtask.link')->get();
        return view('admin.listsubmittask',['listsubmittask'=>$listsubmittask]);
    }
    //admin get file student submit
    public function getfile($link){
        echo "hello";
    }

    //show list task in view for admin
    //admin
    public function getListTaskadmin()
    {
        $listtask = DB::table('task')->orderBy('id', 'desc')->get();
        $listtask;
        return view('admin.givetask', ['listtask' => $listtask]);
    }
    //student
    public function getListTaskStudent()
    {
        $listtask = DB::table('task')->orderBy('id', 'desc')->get();

        return view('student.recievetask', ['listtask' => $listtask]);
    }

    //student
    public function getAllUserForStudent()
    {
        $user = DB::table('users')->get();
        return view('student.inforusers', ['listuser' => $user]);
    }
    public function getUpdateProfileForStudent($id)
    {
        $user = User::find($id);
        return view('student.updateprofile', ['user' => $user]);
    }
    public function postUpdateProfileForStudent(Request $request, $id)
    {
        $user = User::find($id);
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if ($request->changepassword == "on") {
            $this->validate($request, ['password' => 'required'], ['password.required' => "Bạn chưa nhập mật khẩu"]);
            $user->password = bcrypt($request->password);
        }
        $user->save();
        return Redirect('updateprofileforstudent/' . $id)->with('thongbao', "cập nhật thông tin thành công");
    }
    public function submitTask(Request $request, $id)
    {
        if ($request->hasFile('subtask')) {
            $subtask = new subtask();
            $subtask->idsv = Auth::user()->id;
            $subtask->idtask = $id;
            $file = $request->file('subtask');
            $filename = $file->getClientOriginalName('subtask');
            $file->move('subtask', $filename);
            $subtask_avaiable = DB::table('subtask')->where('subtask.idsv',$subtask->idsv)->where('subtask.idtask', $subtask->idtask)->get();
            if(sizeof($subtask_avaiable)!=0){
            $subtask_update=subtask::find($subtask_avaiable[0]->id);
            //get link
            $subtask_update->link = "subtask/" . $filename;
            $subtask_update->time = now();
            $subtask_update->save();
            }
            else{
            $subtask->link = "subtask/" . $filename;
            $subtask->time = now();
            $subtask->save();
            }
            return redirect("recievetask")->with('thongbao', 'Bạn đã nộp bài thành công');
        }
    }
    public function getlistmessS(){
        $listUserChatWithMe=DB::table('message')->join('users','users.id','message.idfrom')
        ->select('message.idfrom','users.name')->where('message.idto',Auth::user()->id)->distinct()->get();
        return view('student.message',['listUserChatWithMe'=>$listUserChatWithMe]);
    }
    public function getlistmessA(){
        $listUserChatWithMe=DB::table('message')->join('users','users.id','message.idfrom')
        ->select('message.idfrom','users.name')->where('message.idto',Auth::user()->id)->distinct()->get();
        return view('admin.message',['listUserChatWithMe'=>$listUserChatWithMe]);
    }
    public function getMessDetailS($id){
        $idfrom=$id;
        $idto=Auth::user()->id;
        $listmess=DB::select('SELECT ms.id,ms.idfrom,us1.name as name1,ms.idto,us2.name as name2,ms.message 
        FROM message ms JOIN users us1 on ms.idfrom= us1.id 
        JOIN users us2 ON ms.idto=us2.id 
        WHERE (ms.idfrom='.$idfrom .' AND ms.idto='.$idto.') 
        OR (ms.idfrom='.$idto.' AND ms.idto='.$idfrom.')');
        return view('student.messagedetail',["listmess"=>$listmess,'idfrom'=>$id]);
    }
    public function getMessDetailA($id){
        $idfrom=$id;
        $idto=Auth::user()->id;
        $listmess=DB::select('SELECT ms.id,ms.idfrom,us1.name as name1,ms.idto,us2.name as name2,ms.message 
        FROM message ms JOIN users us1 on ms.idfrom= us1.id 
        JOIN users us2 ON ms.idto=us2.id 
        WHERE (ms.idfrom='.$idfrom .' AND ms.idto='.$idto.') 
        OR (ms.idfrom='.$idto.' AND ms.idto='.$idfrom.')');
        return view('admin.messagedetail',["listmess"=>$listmess,'idfrom'=>$id]);
    }
    public function postmessS(Request $request,$id){
        $mess = new chatmessage();
        $mess->message=$request->valuemess;
        $mess->idfrom=Auth::user()->id;
        $mess->idto=$id;
        $mess->save();
        return redirect("messagedetail/".$id);
    }
    public function postmessA(Request $request,$id){
        $mess = new chatmessage();
        $mess->message=$request->valuemess;
        $mess->idfrom=Auth::user()->id;
        $mess->idto=$id;
        $mess->save();
        return redirect("messagedetailA/".$id);
    }
    public function deleteMessA($id,$idto){
        $mess=chatmessage::find($id);
        $mess->delete();
        echo $idto;
        return redirect("messagedetailA/".$idto);
    }
    public function deleteMessS($id,$idto){
        $mess=chatmessage::find($id);
        $mess->delete();
        echo $idto;
        return redirect("messagedetail/".$idto);
    }

    public function inforUserA($id){
        $user=User::find($id);
        return view('admin.inforuserdetail',['user'=>$user]);
    }
    public function inforUserS($id){
        $user=User::find($id);
        return view('student.inforuserdetail',['user'=>$user]);
    }
}
