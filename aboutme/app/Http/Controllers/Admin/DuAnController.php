<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Duan;

class DuAnController extends Controller
{
    public function __construct(Duan $mDuan) {
        $this->mDuan = $mDuan;
    }
    public function index(){
    	$duan = new duan();
    	$duanList = $duan->getListPublic();
        return view('admin.duan.index',compact('duanList'));
    }
    public function getEdit($id){
    	$duanEd = new duan();
    	$duanEdit = $duanEd->getItem($id);
        return view('admin.duan.edit',compact('duanEdit'));
    }
    public function postEdit($id,Request $req) {
       // dd($id);
        $result = $this->mDuan->getItem($id);
        $picture = $result->image;
        //dd($picture);
        $name = $req->name;
        $link = $req->link;
        if($req->file('hinhanh')!= NULL){
            $path = public_path('images');
            $pictureDel = $path.'/'.$picture;
           	unlink($pictureDel);
            $hinhanh = $req->file('hinhanh');
            $images = "VNE".time().'-'.$hinhanh->getClientOriginalName();
            $path = public_path('images');
            $hinhanh->move($path,$images);
            $item = [
                'name'=>$name,
                'link'=>$link,
                'preview_text'=>'a',
                'image'=>$images,
            ];

        } else {
            $item = [
                'name'=>$name,
                'link'=>$link,
                'preview_text'=>'a',
                
            ];
        }
        $result = $this->mDuan->editItem($id,$item);
        if($result){
            return redirect()->route('admin.duan.index')->with('msg','Sua thanh cong');

        } else {
            return redirect()->route('admin.duan.index')->with('msg','Sua khong thanh cong');
        } 
}   
    public function getAdd() {
        
        return view('admin.duan.add');
    }
    public function postAdd(Request $req) {
        $this->validate($req,
        [
            'name'=>'required|min:3|',
            
            'link'=>'required',
            

        ],
        [
            'name.required'=>'Bạn chưa nhập tên ',
            
            'name.min'=>'Tên có tối thiểu 3 kí tự',
            
            'link.required'=>'Bạn chưa nhập link dự án',
            
            
            

        ]);
        $name = $req->name;
        $link = $req->link;
       // dd($name);
        
        if($req->file('hinhanh')!= NULL){
            //$picture = $req->file('hinhanh')->store('files');
            $hinhanh = $req->file('hinhanh');
            $images = "VNE".time().'-'.$hinhanh->getClientOriginalName();
            $path = public_path('images');
            $hinhanh->move($path,$images);
           // $arFile = explode('/', $picture);
            //$image = end($arFile);
            $item = [
                'name'=>$name,
                'link'=>$link,
                'preview_text'=>'a',
                'image'=>$images,
                
            ];

        } else {
        $item = [
            'name'=>$name,
                'link'=>$link,
                'preview_text'=>'a',
                'image'=>'',
        ];
    }
        $result = $this->mDuan->addItem($item);
        if($result){
            return redirect()->route('admin.duan.index')->with('msg','Them thanh cong');

        } else {
            return redirect()->route('admin.duan.index')->with('msg','Loi khi them');
        }
    
}
    public function getDel($id) {
        $result = $this->mDuan->getItem($id);
        $picture = $result->picture;
        if($picture !=''){
        $path = public_path('images');
            $pictureDel = $path.'/'.$picture;
            unlink($pictureDel);
        }
        $result = $this->mDuan->delItem($id);
        if($result){
            return redirect()->route('admin.duan.index')->with('msg','Xoa thanh cong');

        } else {
            return redirect()->route('admin.duan.index')->with('msg','Loi khi xoa');
        }
    } 
}
