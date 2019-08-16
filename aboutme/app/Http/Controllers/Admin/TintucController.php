<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tintuc;
use App\Cat;

class TintucController extends Controller
{
    public function __construct(Tintuc $mTintuc) {
        $this->mTintuc = $mTintuc;
    }
    public function index(){
    	$story = new Tintuc();
    	$storyList= $story->getList();
        $count = $story->check();
        return view('admin.story.index',compact('storyList','count'));
    }
    public function ajax($id,$active) {
        $projectActive = new Tintuc();
        if($active == 0) {
            $activeItem = 1;
            $activeTintuc = $projectActive->updateItem($id,$activeItem);
            $count = $projectActive->check();

        } else {
            $activeItem = 0;
            $activeTintuc = $projectActive->updateItem($id,$activeItem);
            $count = $projectActive->check();
        }
        if($count>0){
        return $count;
    } else {
        return '';
    }
        
    }

    public function getEdit($id){
    	$storyEd = new Tintuc();
    	$storyEdit = $storyEd->getItem($id);
    	$listCat = new Cat();
    	$listCatAdmin = $listCat->getListForLeftBar();
        return view('admin.story.edit',compact('storyEdit','listCatAdmin'));
    }
    public function postEdit($id,Request $req) {
        $this->validate($req,
        [
            'name'=>'required|min:3|',
            'mota'=>'required|min:6',
            'chitiet'=>'required|min:6'


        ],
        [
            'name.required'=>'Bạn chưa nhập tên ',
            'name.min'=>'Tên có tối thiểu 3 kí tự',
            'mota.required'=>'Bạn chưa nhập mô tả',
            'mota.min'=>'Mô tả ít nhất có 20 kí tự',
            'chitiet.required'=>'Bạn chưa nhập giá',
            
            'chitiet.min'=>'Giá có ít nhất 6 kí tự',
            

        ]);
       // dd($id);
        $result = $this->mTintuc->getItem($id);
        $picture = $result->picture;
        //dd($picture);
        $name = trim($req->name);
        $danhmuc = trim($req->friendlist);
        $mota = trim($req->mota);
        $chitiet = $req->chitiet;
        $hinhanh = $req->hinhanh;
        if($req->file('hinhanh')!= NULL){
            $path = public_path('images');
            $pictureDel = $path.'/'.$picture;
         //  unlink($pictureDel);
            $hinhanh = $req->file('hinhanh');
            $images = "VNE".time().'-'.$hinhanh->getClientOriginalName();
            $path = public_path('images');
            $hinhanh->move($path,$images);
            $item = [
                'name'=>$name,
                'preview_text'=>$mota,
                'detail_text'=>$chitiet,
                'picture'=>$images,
                'id_cat'=>$danhmuc,
            ];

        } else {
            $item = [
                'name'=>$name,
                'preview_text'=>$mota,
                'detail_text'=>$chitiet,
                'id_cat'=>$danhmuc,
            ];
        }
        $result = $this->mTintuc->editItem($id,$item);
        if($result){
            return redirect()->route('admin.tintuc.index')->with('msg','Sua thanh cong');

        } else {
            return redirect()->route('admin.tintuc.index')->with('msg','Sua khong thanh cong');
        } 
}   
    public function getAdd() {
        $listCat = new Cat();
        $listCatAdmin = $listCat->getListForLeftBar();
        return view('admin.story.add',compact('listCatAdmin'));
    }
    public function postAdd(Request $req) {
         $this->validate($req,
        [
            'name'=>'required|min:3|',
            'mota'=>'required|min:6',
            'chitiet'=>'required|min:6'


        ],
        [
            'name.required'=>'Bạn chưa nhập tên ',
            'name.min'=>'Tên có tối thiểu 3 kí tự',
            'mota.required'=>'Bạn chưa nhập mô tả',
            'mota.min'=>'Mô tả ít nhất có 6 kí tự',
            'chitiet.required'=>'Bạn chưa nhập giá',
            
            'chitiet.min'=>'Chi tiết có ít nhất 6 kí tự',
            

        ]);
        $name = $req->name;
        $checkStory = $this->mTintuc->checkStory($name);
        if($checkStory ==0){
        $danhmuc = trim($req->friendlist);
        
        $mota = trim($req->mota);
        $chitiet = $req->chitiet;
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
                'preview_text'=>$mota,
                'detail_text'=>$chitiet,
                'picture'=>$images,
                'id_cat'=>$danhmuc,
                'active'=>0,
                'id_user'=>0,
                'count_number'=>0
            ];

        } else {
        $item = [
            'name'=>$name,
            'preview_text'=>$mota,
            'detail_text'=>$chitiet,
            'id_cat'=>$danhmuc,
            'count_number'=>0,
            'active'=>0,
            'id_user'=>0,
            'picture'=>'',
        ];
    }
        $result = $this->mTintuc->addItem($item);
        if($result){
            return redirect()->route('admin.tintuc.index')->with('msg','Them thanh cong');

        } else {
            return redirect()->route('admin.tintuc.index')->with('msg','Loi khi them');
        }
    } else {
        return redirect()->route('admin.tintuc.index')->with('loi','Truyen da ton tai');
    }
}
    public function getDel($id) {
        $result = $this->mTintuc->getItem($id);
        $picture = $result->picture;
        if($picture !=''){
        $path = public_path('images');
            $pictureDel = $path.'/'.$picture;
            unlink($pictureDel);
        }
        $result = $this->mTintuc->delItem($id);
        if($result){
            return redirect()->route('admin.tintuc.index')->with('msg','Xoa thanh cong');

        } else {
            return redirect()->route('admin.tintuc.index')->with('msg','Loi khi xoa');
        }
    } 

}
