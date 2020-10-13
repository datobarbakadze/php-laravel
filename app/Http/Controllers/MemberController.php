<?php

namespace App\Http\Controllers;

use App\Content;
use App\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index(){
        return view("member.member",["data"=>new ContactController]);
    }
    public function getText($id){
        $model = new Content();
        $item = $model->where(["page"=>"contact",'content_id'=>$id])->first();

        return $item;
    }
    public function list(Member $model){
        $members = $model->orderBy('id','DESC')->get();
        return view('member.list',compact('members'),["data"=>new ContactController]);
    }
    public function show(Member $model){
        // TODO get single memnber
    }
    public function store(Member $model){
        $data = $this->validateForm();
        $creation = $model->create($data);
        if ($creation){
            return back();
        }
    }
    public function validateForm(){
        return request()->validate([
            'f_name'=>'required',
            'l_name'=>'required',
            'company'=>'',
            'phone'=>'required',
            'email'=>'required',
            'address'=>'required',
            'position'=>'required'
        ]);
    }
    public function delete(Member $model){
        // TODO get single memnber
    }

}
