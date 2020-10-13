<?php

namespace App\Http\Controllers;

use App\Content;
use App\Gallery;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class GalleryController extends Controller
{
    public function index(Gallery $model){
        $gallery = $model->orderBy('id','DESC')->get();
        return view('gallery.gallery',["data"=>new GalleryController,'gallery'=>$gallery]);
    }
    public function getText($id){
        $model = new Content();
        $item = $model->where(["page"=>"gallery",'content_id'=>$id])->first();

        return $item;
    }
    public function store(Gallery $model){
        $data = $this->validateData();

        $create_instance = $model->create($data);
        if ($create_instance){
            if($this->storeImage($create_instance)){
                return response()->json(["error"=>"success","errMsg"=>"წარმატებული დამატება"]);
            }else
                return response()->json(["error"=>"success","errMsg"=>"სურათის ატვირთვა ვერ ხერხდება"]);
        }else
            return response()->json(["error"=>"error","errMsg"=>"ბაზაში დამატებე ვერ ხერხდება"]);

    }
    public function validateData(){
        return request()->validate([
            "image"=>"required|file|image|max:10000",
        ]);
    }
    public function delete($id,Gallery $model){
        $imagePath = $model->where(["id"=>$id])->pluck("image")->first();
        if(File::exists(public_path("storage/".$imagePath)))
            File::delete(public_path("storage/".$imagePath));
        if(File::exists(public_path("storage/s_".$imagePath)))
            File::delete(public_path("storage/s_".$imagePath));
        if($model->where(["id"=>$id])->delete()){
            return response()->json(["error"=>"success","item_id"=>$id]);
        }else
            return response()->json(["error"=>"error","errMsg"=>"ვერ მოხერხდა ბაზიდან წაშლა"]);
    }
    public function storeImage($model){
        if(request()->hasFile("image")){

            $update = $model->update([
                'image' => request()->image->store("gallery","public")
            ]);
            if($update){
                $image = Image::make(public_path("storage/".$model->image))->fit(450,450);
                $image->save(public_path("storage/s_".$model->image));
                $image = Image::make(public_path("storage/".$model->image))->fit(640,640);
                $image->save(public_path("storage/".$model->image));
                return true;
            }
        }else{
            return true;
        }
    }
}
