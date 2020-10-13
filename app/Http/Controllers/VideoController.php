<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index(Video $model){
        $videos = $model->orderBy('id','DESC')->orderBy("id","DESC")->paginate(6);
        return view('videos.videos',compact('videos'));
    }
    public function search(Video $model,$logos){
        $videos = $model->where('title','like','%'.$logos.'%')->paginate(6);
        return view('videos.videos',compact('videos'));
    }
    public function store(Video $model){
        $data = $this->validateData();
        $path = explode("=",$data["url"])[1];
        $data["url"]="https://www.youtube.com/embed/".$path;
        $creation = $model->create($data);
        if ($creation){
            return response()->json(["error"=>"success","errMsg"=>"ვიდეო წარმატებით დაემატა"]);
        }else{
            return response()->json(["error"=>"error","errMsg"=>"ვიდეოს დამატება ვერ ხერხდება"]);
        }
    }
    public function validateData(){
        return request()->validate([
            'title'=>'required',
            'url'=>'required|url'
        ]);
    }
    public function delete(Video $model,$id){
        $delete = $model->where(["id"=>$id])->delete();
        if ($delete){
            return response(["error"=>"success","errMsg"=>"ვიდეო წარმატებით წაიშალა","item_id"=>$id]);
        }else
            return response()->json(["error"=>"error","errMsg"=>"ვიდეოს წაშლა ვერ ხერხდება"]);
    }
}
