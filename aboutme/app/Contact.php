<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table= "contact";
    protected $primaryKey = "id_contact";
    public $timestamps = false;

    public function getContact() {
    	return $this->orderBy('id_contact','desc')->paginate(5);
    }
    public function getContactEdit($id) {
    	return $this->findOrFail($id);
    }
    public function editItem($id,$item) {
        return $this->where('id_contact',$id)->update($item);
    }
    public function addItem($item) {
        return $this->insert($item);
    }
    public function delItem($id) {
        return $this->where('id_contact',$id)->delete();
    }
}
