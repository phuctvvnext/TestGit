<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contact;
use Illuminate\Support\Facades\Input;
use Hash;
use Mail;

class ContactController extends Controller
{
    public function __construct(Contact $mContact) {
        $this->mContact = $mContact;
    }
    public function index() {
    	$contactAll = new Contact();
    	$listContact = $contactAll->getContact();
    	return view('admin.contact.index',compact('listContact'));
    }
    public function getEdit($id) {
    	$contact = new Contact();
    	$contactEdit = $contact->getContactEdit($id);
    	return view('admin.contact.edit',compact('contactEdit'));
    }
    public function postEdit($id,Request $req) {
        $name = $req->name;
        $email= $req->email;
        $websitte = $req->websitte;
        $noidung = $req->noidung;
        
        $data = [
            'name' => $req->name,
            'noidung' => $req->noidung
        ];
            Mail::send('mail', $data, function ($msg) {
            $msg->from('shopwatchs2019@gmail.com', 'About me');
            $msg->to(Input::get('email'), 'Phúc Trần')->subject('Phuc Tran đã nhận được phản hồi');
        });

            return redirect()->route('admin.lienhe.index')->with('msg','Phản hồi thành công');
       
    }
    public function getAdd() {
        return view('admin.contact.add');
    }
    public function postAdd(Request $req) {
        $name = trim($req->name);
        $email = trim($req->email);
        $website = trim($req->website);
        $noidung = trim($req->noidung);
        $item = [
            'fullname' =>$name,
            'email' =>$email,
            'address'=>'',
            'phone' =>$website,
            'content' =>$noidung
        ];
        $result = $this->mContact->addItem($item);
        if($result){
            return redirect()->route('admin.lienhe.index')->with('msg','Them thanh cong');

        } else {
            return redirect()->route('admin.lienhe.index')->with('msg','Loi khi them');
        }
    }
    public function postAddPublic(Request $req) {
        $name = trim($req->name);
       // dd($name);
        $email = trim($req->email);
        $subject = trim($req->subject);
        $noidung = trim($req->message);
        $item = [
            'fullname' =>$name,
            'email' =>$email,
            'address'=>'',
            'phone' =>$subject,
            'content' =>$noidung
        ];
       // dd($item);
        $result = $this->mContact->addItem($item);
        if($result){
            return redirect()->route('aboutme.index.index')->with('msg','Them thanh cong');

        } else {
            return redirect()->route('aboutme.index.index')->with('msg','Loi khi them');
        }
    }
    public function getDel($id) {
        $result = $this->mContact->delItem($id);
        if($result){
            return redirect()->route('admin.lienhe.index')->with('msg','Xoa thanh cong');

        } else {
            return redirect()->route('admin.lienhe.index')->with('msg','Loi khi xoa');
        }
    }
    public function publicPostAdd(Request $req) {
        $name = trim($req->name);
        $email = trim($req->email);
        $website = trim($req->website);
        $noidung = trim($req->noidung);
        $item = [
            'fullname' =>$name,
            'email' =>$email,
            'phone' =>$website,
            'content' =>$noidung
        ];
        $result = $this->mContact->addItem($item);
        if($result){
            return redirect()->route('bstory.contact.index')->with('msg','Them thanh cong');

        } else {
            return redirect()->route('bstory.contact.index')->with('msg','Loi khi them');
        }
    }
}
