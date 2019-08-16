<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $table = "skill";
    protected $primaryKey = "id_skill";
    public $timestamps = false;

    public function getList() {
        return $this->paginate(getenv('ADMIN_PAGINATE'));
    }
    public function addItem($item) {
        return $this->insert($item);
    }
    public function delItem($id) {
        return $this->where('id_skill',$id)->delete();
    }
    public function getItem($id) {
        return $this->findOrFail($id);
    }
    public function editItem($id,$item) {
        return $this->where('id_skill',$id)->update($item);
    }
    
}
