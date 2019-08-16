<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table= "comment";
    protected $primaryKey = "id_cm";
    public $timestamps = true;

    public function getComment() {
    	return $this->orderBy('id_cm','desc')->paginate(5);
    }
    public function delItem($id) {
        return $this->where('id_cm',$id)->delete();
    }
   	public function addItem($item) {
        return $this->insert($item);
    }
    public function getCommentNews($id) {
        return $this->where('id_news',$id)->get();
    }
}
