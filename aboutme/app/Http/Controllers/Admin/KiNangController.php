<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Skill;

class KiNangController extends Controller
{
    public function __construct(Skill $mSkill) {
    	$this->mSkill = $mSkill;
    }
    public function index() {
    	$listSK = $this->mSkill->getList();
    	return view('admin.kinang.index',compact('listSK'));
    }
    public function getEdit($id) {
    	$skillEdit = $this->mSkill->getItem($id);
    	return view('admin.kinang.edit',compact('skillEdit'));
    }
    public function postEdit($id,Request $req) {
    	$name = $req->name;
    	$point = $req->point;
    	//dd($name);
    	//	dd($point);
    	$item = [
    		'name' =>$name,
    		'point' =>$point,
    		
    	];
    	$result = $this->mSkill->editItem($id,$item);
    	if($result){
    		return redirect()->route('admin.kinang.index')->with('msg','Sua thanh cong');
    	} else  {
    		return redirect()->route('admin.kinang.index')->with('msg','Sua khong thanh cong');
    	}
    }
    public function getAdd() {
    	return view('admin.kinang.add');
    }
    public function postAdd(Request $req) {
        $this->validate($req,
        [
            'name'=>'required|min:3|',
            
            'point'=>'required|integer',
            

        ],
        [
            'name.required'=>'Bạn chưa nhập tên ',
            
            'name.min'=>'Tên có tối thiểu 3 kí tự',
            
            'point.required'=>'Bạn chưa nhập điểm số',
            'point.integer'=>'Bạn phải nhập số',
            
            

        ]);
    	$name = trim($req->name);
       	$point = $req->point;
        
    	$item = [
    		'name' =>$name,
    		
    		'point' =>$point
    	];
    	$result = $this->mSkill->addItem($item);
    	if($result){
    		return redirect()->route('admin.kinang.index')->with('msg','Them thanh cong');

    	} else {
    		return redirect()->route('admin.kinang.index')->with('msg','Loi khi them');
    	}
    
    }
    public function getDel($id) {
    	$result = $this->mSkill->delItem($id);
    	if($result){
    		return redirect()->route('admin.kinang.index')->with('msg','Xoa thanh cong');

    	} else {
    		return redirect()->route('admin.kinang.index')->with('msg','Loi khi xoa');
    	}
    }
}
