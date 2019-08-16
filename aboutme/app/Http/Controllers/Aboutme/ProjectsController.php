<?php

namespace App\Http\Controllers\Aboutme;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectsController extends Controller
{
    public function index() {
    	return view('aboutme.project.index');

    }
    public function detail($slug,$id) {
    	return view('aboutme.project.detail');
    }
}
