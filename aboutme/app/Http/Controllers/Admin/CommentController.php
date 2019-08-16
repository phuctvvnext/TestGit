<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment;

class CommentController extends Controller
{
    public function __construct(Comment $mComment) {
        $this->mComment = $mComment;
    }
    public function index(){
    	$comment = new Comment();
    	$commentList= $comment->getComment();
        return view('admin.comment.index',compact('commentList'));
    }
    public function getDel($id) {
    	$result = $this->mComment->delItem($id);
    if($result){
    	return redirect()->route('admin.comment.index')->with('msg','Xoa thanh cong');
    } else {
    	return redirect()->route('admin.comment.index')->with('msg','Xoa khong thanh cong');
    }
    }
}
