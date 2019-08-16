<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\http\Feedback;
use Response;
use Illuminate\http\Request;
use App\Comment;
use App\Tintuc;
use App\Cat;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function download() {
    	$file_path = public_path('files/CV.pdf');
    	return response()->download($file_path);
    }
    public function active($id,$active) {
    	dd($id);
    }
    public function getSearch(Request $req) {
        $key = $req->key;
       $product = new Tintuc();
       $searchProduct = $product->search($key);
       $news = new Tintuc();
      
      $danhmuc = new Cat();
      $danhmucforleftbar = $danhmuc->getListForLeftBar();
      $tintucXemnhieu = $news->getListTM();
      
     // $tintuc = $news->getListDM($id);
       //dd($searchProduct);
       return view('aboutme.search',compact('searchProduct','danhmucforleftbar','tintucXemnhieu'));

    }
    public function comment($id,Request $req) {
    	$id = $id;
    	$name = $req->name;
  		$noidung = $req->noidung;
  		$email = $req->email;
  		//echo $id.$name.$noidung.$email;
  		$item = [
  			'fullname'=>$name,
            'content'=>$noidung,
            'id_news'=>$id,
  		];
  		$commentNew = new Comment();
  		$addComment = $commentNew->addItem($item);
  		$allComment = $commentNew->getCommentNews($id);
      $count = count($allComment);
      $countnew = $count++;
      echo "<h4>{$countnew} Comments</h4>";
  		foreach ($allComment as $value) {
  			# code...
  		
  		//echo "{$id}";
  			echo "
  			<div class='comment-list'>
  			<div class='single-comment justify-content-between d-flex'>
  			<div class='user justify-content-between d-flex'>
  			<div class='thumb'>
  			<img src='img/blog/c1.jpg' alt=''>
  			</div>
  			<div class='desc'>
	  		<h5><a href='#'>{$value->fullname}</a></h5>
	  		<p class='date'>December 4, 2017 at 3:12 pm </p>
	  		<p class='comment'>
	  		{$value->content}
	  		</p>
	  		</div>
	  		</div>
	  		<div class='reply-btn'>
	  		<a href=' class='btn-reply text-uppercase'>reply</a> 
	  		</div>
	  		</div>
	  		</div>"	;
  		}
  		
                            
                            
                            
    }
}
