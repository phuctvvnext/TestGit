<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Changduong;
class ChangDuongController extends Controller
{
     public function __construct(Changduong $mChangduong) {
    	$this->mChangduong = $mChangduong;
    }
    public function index() {
    	$listSK = $this->mChangduong->getList();
    	return view('admin.changduong.index',compact('listSK'));
    }
    public function getEdit($id) {
    	$skillEdit = $this->mChangduong->getItem($id);
    	return view('admin.changduong.edit',compact('skillEdit'));
    }
    public function postEdit($id,Request $req) {
    	$name = trim($req->name);
    	$phanloai = $req->phanloai;
    	$ngay = $req->thoigian;
       	$noidung = $req->noidung;
        
    	$item = [
    		'name' =>$name,
    		'phanloai'=>$phanloai,
    		'thoigian'=>$ngay,
    		'detail_text' =>$noidung,
    	];
    	$result = $this->mChangduong->editItem($id,$item);
    	if($result){
    		return redirect()->route('admin.changduong.index')->with('msg','Sua thanh cong');
    	} else  {
    		return redirect()->route('admin.changduong.index')->with('msg','Sua khong thanh cong');
    	}
    }
    public function getAdd() {

    	return view('admin.changduong.add');
    }
    public function postAdd(Request $req) {
        $this->validate($req,
        [
            'name'=>'required|min:3|',
            'thoigian'=>'required',
            'detail_text'=>'required',

        ],
        [
            'name.required'=>'Bạn chưa nhập tên ',
            'name.min'=>'Tên có tối thiểu 3 kí tự',
            'thoigian.required'=>'Bạn chưa nhập link dự án',
            'detail_text.required'=>'Bạn chưa nhập link dự án',
            
            
            

        ]);
    	$name = trim($req->name);
    	$phanloai = $req->phanloai;
    	$ngay = $req->thoigian;
       	$noidung = $req->noidung;
        
    	$item = [
    		'name' =>$name,
    		'phanloai'=>$phanloai,
    		'thoigian'=>$ngay,
    		'detail_text' =>$noidung,
    	];
    	$result = $this->mChangduong->addItem($item);
    	if($result){
    		return redirect()->route('admin.changduong.index')->with('msg','Them thanh cong');

    	} else {
    		return redirect()->route('admin.changduong.index')->with('msg','Loi khi them');
    	}
    
    }
    public function getDel($id) {
    	$result = $this->mChangduong->delItem($id);
    	if($result){
    		return redirect()->route('admin.changduong.index')->with('msg','Xoa thanh cong');

    	} else {
    		return redirect()->route('admin.changduong.index')->with('msg','Loi khi xoa');
    	}
    }
}
