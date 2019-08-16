<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Duan extends Model
{
    protected $table= "projects";
    protected $primaryKey = "id_project";
    public $timestamps = false;

    public function getListPublic() {
    	return $this->orderBy('id_project','desc')->paginate(5);
    }
    public function getItem($id){
    	//dd($id);
    	return $this->findOrFail($id);
    }
    public function editItem($id,$item) {
        return $this->where('id_project',$id)->update($item);
    }
    
    
    public function addItem($item) {
        return $this->insert($item);
    }
    public function delItem($id) {
        return $this->where('id_project',$id)->delete();
    }
}
