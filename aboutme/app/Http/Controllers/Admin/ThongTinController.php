<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Thongtin;

class ThongTinController extends Controller
{
	public function __construct(Thongtin $mThongtin) {
		$this->mThongtin = $mThongtin;
	}
	public function index(){
		$info = new Thongtin();
		$infoList= $info->getListPublic();
		return view('admin.thongtin.index',compact('infoList'));
	}

	public function getEdit($id){
		$info = new Thongtin();
		$infoEdit = $info->getItem($id);
		
		return view('admin.thongtin.edit',compact('infoEdit'));
	}
	public function postEdit($id,Request $req) {
       // dd($id);
        
		$name = trim($req->name);
		$email = trim($req->email);
		$phone = trim($req->phone);
		$chitiet = $req->chitiet;
		$diachi = $req->diachi;
			$item = [
				'name'=>$name,
				'phone'=>$phone,
				'email'=>$email,
				'diachi'=>$diachi,
				'detail'=>$chitiet,
			];
		$result = $this->mThongtin->editItem($id,$item);
		if($result){
			return redirect()->route('admin.thongtin.index')->with('msg','Sua thanh cong');

		} else {
			return redirect()->route('admin.thongtin.index')->with('msg','Sua khong thanh cong');
		} 
	}   
	public function getAdd() {
		
		return view('admin.thongtin.add');
	}
	public function postAdd(Request $req) {
		$this->validate($req,
        [
            'name'=>'required|min:3|',
            'ngaysinh'=>'required',
            'phone'=>'required|integer',
            'email'=>'required|min:6|email',
            'diachi'=>'required',
            'chitiet'=>'required|min:6'


        ],
        [
            'name.required'=>'Bạn chưa nhập tên ',
            'ngaysinh.required'=>'Bạn chưa nhập ngày sinh',
            'name.min'=>'Tên có tối thiểu 3 kí tự',
            'mota.required'=>'Bạn chưa nhập mô tả',
            'mota.min'=>'Mô tả ít nhất có 20 kí tự',
            'phone.required'=>'Bạn chưa nhập sđt',
            'phone.integer'=>'Bạn phải nhập số',
            'email.required'=>'Bạn chưa nhập email',
            'email.email'=>'Bạn nhập sai định dạng email',
            'diachi.required'=>'Bạn phải nhập địa chỉ',
            'chitiet.required'=>'Bạn chưa nhập chi tiết',
            'chitiet.min'=>'Giá có ít nhất 6 kí tự',
            

        ]);
		$name = trim($req->name);
		$email = trim($req->email);
		$phone = trim($req->phone);
		$chitiet = $req->chitiet;
		$diachi = $req->diachi;
		$ngaysinh = $req->ngaysinh;
			$item = [
				'name'=>$name,
				'phone'=>$phone,
				'email'=>$email,
				'diachi'=>$diachi,
				'detail'=>$chitiet,
				'ngaysinh'=>$ngaysinh
			];
		$result = $this->mThongtin->addItem($item);
		if($result){
			return redirect()->route('admin.thongtin.index')->with('msg','Them thanh cong');

		} else {
			return redirect()->route('admin.thongtin.index')->with('msg','Them khong thanh cong');
		} 
	}
	public function getDel($id) {
		
		$result = $this->mThongtin->delItem($id);
		if($result){
			return redirect()->route('admin.thongtin.index')->with('msg','Xoa thanh cong');

		} else {
			return redirect()->route('admin.thongtin.index')->with('msg','Loi khi xoa');
		}
	} 
}
