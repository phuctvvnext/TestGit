<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Changduong extends Model
{
    protected $table = "advs";
    protected $primaryKey = "id_advs";
    public $timestamps = false;

    public function getList() {
        return $this->paginate(getenv('ADMIN_PAGINATE'));
    }
    public function addItem($item) {
        return $this->insert($item);
    }
    public function delItem($id) {
        return $this->where('id_advs',$id)->delete();
    }
    public function getItem($id) {
        return $this->findOrFail($id);
    }
    public function editItem($id,$item) {
        return $this->where('id_advs',$id)->update($item);
    }
}
