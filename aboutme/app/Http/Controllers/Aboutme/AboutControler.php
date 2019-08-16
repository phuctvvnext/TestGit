<?php

namespace App\Http\Controllers\Aboutme;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutControler extends Controller
{
    public function about() {
    	return view('aboutme.about.index');
    }
}
