<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Auth;

class UserController extends Controller
{
    public function __construct(User $muser) {
		$this->muser = $muser;
	}
    public function index() {
    	$users = $this->muser->getList();
    	return view('admin.user.index',compact('users'));
    }
    public function getAdd() {
    	return view('admin.user.add');
    }
    public function postAdd(Request $req) {
        $this->validate($req,
        [
            'username'=>'required|min:3',
            'password'=>'required|min:6',
            'fullname'=>'required',

        ],
        [
            'username.required'=>'Bạn chưa nhập tên ',
            'username.min'=>'Tên có tối thiểu 3 kí tự',
            'password.required'=>'Bạn chưa nhập link dự án',
            'password.min'=>'Mật khẩu có ít nhất 6 kí tự',
            'fullname.required'=>'Bạn chưa nhập tên người dùng',
            
            
            

        ]);
    	$username = trim($req->username);
        $checkUser = $this->muser->checkUser($username);
        if($checkUser==0){
    	$password = trim($req->password);
    	$fullname = trim($req->fullname);
    	$item = [
    		'username' =>$username,
    		'password' =>bcrypt($password),
    		'fullname' =>$fullname
    	];
    	$result = $this->muser->addItem($item);
    	if($result){
    		return redirect()->route('admin.user.index')->with('msg','Them thanh cong');

    	} else {
    		return redirect()->route('admin.user.index')->with('msg','Loi khi them');
    	}
    } else {
        return redirect()->route('admin.user.index')->with('loi','Nguoi dung ta ton tai');
    }
    }

    public function getDel($id) {
        $user = $this->muser->getItem($id);
        if($user->username == 'admindemo') {
            return redirect()->route('admin.user.index')->with('msg','Ban khong the xoa admin');
        }
    	$result = $this->muser->delItem($id);
    	if($result){
    		return redirect()->route('admin.user.index')->with('msg','Xoa thanh cong');

    	} else {
    		return redirect()->route('admin.user.index')->with('msg','Loi khi xoa');
    	}
    }
    public function getEdit($id) {
    	$user = $this->muser->getItem($id);
        if(Auth::user()->username != $user->username && Auth::user()->username != 'admindemo') {
            return redirect()->route('admin.user.index')->with('msg','Ban khong duoc sua thong tin cua nguoi khac');
        }
    	return view('admin.user.edit',compact('user'));
    }	
    public function postEdit($id,Request $req) {
    	/*$id = $req->id;
    	dd($id);*/
    	$username = trim($req->username);
    	$password = trim($req->password);
    	$fullname = trim($req->fullname);
    	if($password!=''){
    	$item = [
    		'username' =>$username,
    		'password' =>bcrypt($password),
    		'fullname' =>$fullname
    	];
    	} else {
    		$item = [
    		'username' =>$username,
    		'fullname' =>$fullname
    	];
    	}
    	$result = $this->muser->editItem($id,$item);
    	if($result){
    		return redirect()->route('admin.user.index')->with('msg','Sua thanh cong');

    	} else {
    		return redirect()->route('admin.user.index')->with('msg','Loi khi sua');
    	}

    }
}
