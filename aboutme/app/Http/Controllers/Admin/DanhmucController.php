<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cat;
use App\Http\Requests\DanhmucRequest;

class DanhmucController extends Controller
{
    public function __construct(Cat $mcat) {
		$this->mcat = $mcat;
        
	}
    public function index() {
    	$listCat = $this->mcat->getListForLeftBar();
    	return view('admin.danhmuc.index',compact('listCat'));
    }
    public function getEdit($id) {
    	$catEdit = $this->mcat->getCatEdit($id);
    	return view('admin.danhmuc.edit',compact('catEdit'));
    }
    public function postEdit($id,DanhmucRequest $req) {
    	$name = $req->name;

    	$result = $this->mcat->editItem($id,$name);
    	if($result){
    		return redirect()->route('admin.danhmuc.index')->with('msg','Sua thanh cong');
    	} else  {
    		return redirect()->route('admin.danhmuc.index')->with('msg','Sua khong thanh cong');
    	}
    }
    public function getAdd() {
    	return view('admin.danhmuc.add');
    }
    public function postAdd(DanhmucRequest $req) {
    	$name = $req->name;
        $checkCat = $this->mcat->checkCat($name);
        //dd($checkCat);
        //dd($checkCat);
        if($checkCat >0){
            return redirect()->route('admin.danhmuc.index')->with('msg','Danh muc da ton tai');
        } else {
    	$result = $this->mcat->addItem($name);
    	if($result){
    		return redirect()->route('admin.danhmuc.index')->with('msg','Them thanh cong');
    	} else  {
    		return redirect()->route('admin.danhmuc.index')->with('loi','Them khong thanh cong');
    	}
        } 
    }
    public function getDel($id) {
        
    	$result = $this->mcat->delItem($id);

    
    if($result){
    	return redirect()->route('admin.danhmuc.index')->with('msg','Xoa thanh cong');
    } else {
    	return redirect()->route('admin.danhmuc.index')->with('msg','Xoa khong thanh cong');
    }
   }
}
