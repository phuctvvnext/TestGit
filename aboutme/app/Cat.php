<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    protected $table= "category";
    protected $primaryKey = "id_cat";
    public $timestamps = false;

    public function getListForLeftBar() {
    	return $this->orderBy('id_cat','asc')->get();
    }
    public function getCatEdit($id) {
    	return $this->findOrFail($id);
    }
    public function editItem($id,$name) {
    	//dd($name);
    	//dd($id);
        return $this->where('id_cat',$id)->update(['name'=>$name]);
    }
    public function addItem($name) {
        return $this->insert(['name'=>$name]);
    }
    public function delItem($id) {
        return $this->where('id_cat',$id)->delete();
    }
    public function checkCat($name) {
        return $this->where('name',$name)->count();
    }
}
