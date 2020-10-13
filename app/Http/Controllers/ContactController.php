<?php

namespace App\Http\Controllers;

use App\Content;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    private $to = "asfas@example.com";
    public function index(){
        return view("contact",["data"=>new ContactController]);
    }
    public function getText($id){
        $model = new Content();
        $item = $model->where(["page"=>"member",'content_id'=>$id])->first();

        return $item;
    }
    public function sendMail(){
        $data = $this->mailFormValidation();
        $headers = 'From: webmaster@example.com' . "\r\n" .
            'Reply-To: ' . $data["email"] . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
        mail($this->to,$data["subjectName"],$data["msg"],$headers);
    }
    public function mailFormValidation(){
        return request()->validate([
            'firstName'=>'required',
            'email'=>'required',
            'subjectName'=>'required',
            'phone'=>'required',
            'msg'=>'required'
        ]);
    }
}
