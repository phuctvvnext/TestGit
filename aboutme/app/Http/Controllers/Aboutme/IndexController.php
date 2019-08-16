<?php

namespace App\Http\Controllers\Aboutme;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Changduong;
use App\Comment;
use App\Contact;
use App\Duan;
use App\Skill;
use App\Thongtin;
use App\Tintuc;
use App\User;
use App\Cat;


class IndexController extends Controller
{
    public function index() {
    	$info = new Thongtin();
    	$info_banthan = $info->getListPublic();
    	$kinang = new Skill();
    	$kinang_banthan = $kinang->getList();
    	$duan = new Duan();
    	$duan_banthan = $duan->getListPublic();
    	$new = new Tintuc();
    	$tintuc = $new->getListPublic();
    	$tintucXemnhieu = $new->getListTM();

    	return view('aboutme.index.index',compact('info_banthan','kinang_banthan','duan_banthan','tintuc','tintucXemnhieu'));
    }
}
