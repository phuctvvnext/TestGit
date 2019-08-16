<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tintuc extends Model
{
    protected $table= "news";
    protected $primaryKey = "id_news";
    public $timestamps = true;

    public function getListPublic() {
    	return $this->where('active','1')->orderBy('id_news','desc')->paginate(5);
    }
    public function getList() {
        return DB::table('category as cat')->join('news as new','cat.id_cat','new.id_cat')->select('new.name','new.id_news','new.preview_text','new.detail_text','new.id_cat','new.active','cat.name as catname','new.count_number','new.picture')->paginate(5);
    }
    public function getItem($id){
    	//dd($id);
    	return $this->findOrFail($id);
    }
    public function editItem($id,$item) {
        return $this->where('id_news',$id)->update($item);
    }
    public function getListDM($id) {
        return $this->where('id_cat',$id)->paginate(5);
    }
    public function getListTM() {
        return $this->orderBy('id_news','desc')->skip(0)->take(6)->get();
    }
    public function addItem($item) {
        return $this->insert($item);
    }
    public function delItem($id) {
        return $this->where('id_news',$id)->delete();
    }

    public function truyenLienQuan($id,$id_cat) {
        return $this->where('id_cat',$id_cat)->where('id_news','<>',$id)->skip(0)->take(3)->get();
    }

    public function getItemByCat($id_cat) {
        return $this->where('id_cat',$id_cat)->get();
    }
    public function checkStory($name) {
        return $this->where('name',$name)->count();
    }

    public function updateItem($id,$active) {
        return $this->where('id_news',$id)->update(['active'=>$active]);
    }
    public function check() {
        return $this->where('active','0')->count();
    }
   /* public function checkdate(month, day, year){
        return DB::table('news as new ')->join('category as cat','điều kiện','điều kiện')->select->get()
    }
    public function checkdate(month, day, year) {

    }
    public function */
}
