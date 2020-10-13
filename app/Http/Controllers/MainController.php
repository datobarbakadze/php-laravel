<?php

namespace App\Http\Controllers;

use App\Content;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function CKUploader(Request $request){
        if(request()->hasFile("image")){
            $imagePath = request()->image->store("ck_images","public");
            $fileName = explode("/",$imagePath)[1];
            $url = asset("storage/".$imagePath);
            $returnData = [
                "uploaded"=>1,
                "fileName"=>$fileName,
                "url"=>$url
            ];
            return response()->json($returnData);
        }else{
            return response()->json("fail");
        }

    }
    public function addContent(Request $request, Content $content){
        $data = $request->validate([
            "page"=>'required',
            "content"=>'required',
            'content_id'=>'required'
            ]);
        if(!is_null($content->where(["content_id"=>(int) $data["content_id"],"page"=>$data["page"]])->first())){

            $update = $content->where(["content_id"=>(int) $data["content_id"],"page"=>$data["page"]])->update($data);
            if($update){
                return response()->json(["error"=>"success","errMsg"=>"წარმატებული განახლება"]);
            }else
                return response()->json(["error"=>"error","errMsg"=>"წარუმატებელი განახლება"]);
        }else{
            $content->create($data);
            return response()->json(["error"=>"success","errMsg"=>"წარმატებული დამატება"]);
        }
    }

    public function test(Content $content){
        if(is_null($content->where(["content_id"=>2,"page"=>"about"])->first())){

        }
    }
}
