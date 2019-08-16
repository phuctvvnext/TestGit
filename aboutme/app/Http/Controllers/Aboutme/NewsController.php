<?php

namespace App\Http\Controllers\Aboutme;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tintuc;
use App\Cat;
use App\Comment;

class NewsController extends Controller
{
    public function index() {
    	return view('aboutme.news.index');
    }
    public function detail($slug,$id) {
    	$new = new Tintuc();
    	$tintuc = $new->getItem($id);
    	$id_cat = $tintuc->id_cat;
    	$danhmuc = new Cat();
    	$danhmucforleftbar = $danhmuc->getListForLeftBar();
    	$tintucXemnhieu = $new->getListTM();
    	$tintucLQ = $new->truyenLienQuan($id,$id_cat);
        $comment = new Comment();
        $commentList = $comment->getCommentNews($id);
    	//dd($truyenlienquan);
    	return view('aboutme.news.detail_news',compact('tintuc','danhmucforleftbar','tintucXemnhieu','tintucLQ','commentList'));
    }
    public function getCat($id) {
    	//dd($news);
    	$news = new Tintuc();
    	
    	$danhmuc = new Cat();
    	$danhmucforleftbar = $danhmuc->getListForLeftBar();
    	$tintucXemnhieu = $news->getListTM();
    	
    	$tintuc = $news->getListDM($id);

    	return view('aboutme.news.danhmuc',compact('tintuc','danhmucforleftbar','tintucXemnhieu'));
    }

}
