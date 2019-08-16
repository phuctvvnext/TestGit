<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct() {

    }
    public function getLogin() {
    	return view('auth.auth.login');
    }
    public function postLogin(Request $req) {
    	// $username = trim($req->username);
    	// $password = trim($req->password);
    	$credentials = $req->only('username','password');
    	if(Auth::attempt($credentials)) {
    		return redirect()->route('admin.tintuc.index');
    	} else {
    		return redirect()->route('auth.auth.login')->with('msg','Sai username hoac password');
    	}
    }

    public function logout() {
    	Auth::logout();
    	return redirect()->route('auth.auth.login');
    }
}
