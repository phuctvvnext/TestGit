<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thongtin extends Model
{
    protected $table= "aboutme";
    protected $primaryKey = "id_aboutme";
    public $timestamps = false;

    public function getListPublic() {
    	return $this->orderBy('id_aboutme','desc')->paginate(5);
    }
    public function getItem($id){
    	//dd($id);
    	return $this->findOrFail($id);
    }
    public function editItem($id,$item) {
        return $this->where('id_aboutme',$id)->update($item);
    }
    public function getListDM($id) {
        return $this->where('id_aboutme',$id)->paginate(5);
    }
    public function getListTM() {
        return $this->orderBy('id_aboutme','desc')->skip(0)->take(6)->get();
    }
    public function addItem($item) {
        return $this->insert($item);
    }
    public function delItem($id) {
        return $this->where('id_aboutme',$id)->delete();
    }

    

    public function getItemByCat($id_aboutme) {
        return $this->where('id_aboutme',$id_aboutme)->get();
    }
    
}
