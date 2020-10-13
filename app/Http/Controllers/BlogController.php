<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    public function index(Blog $model){
        $blogs = $model->orderBy('id','DESC')->paginate(6);
        return view('blog.blog',compact('blogs'));
    }
    public function search(Blog $model,$logos){
        $blogs = $model->where('title','like','%'.$logos.'%')->paginate(6);
        return view('blog.blog',compact('blogs'));
    }
    public function show(Blog $model, $blog_id ){
        $blog = $model->where(['id'=>$blog_id])->first();
        if(!is_null($blog)){
            return view('blog.blog_single',compact('blog'));
        }else
            abort(404);
    }
    public function store(Request $request, Blog $model){
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
            "title"=>"required",
            "description"=>"required",
            "image"=>"sometimes|file|image|max:10000",
        ]);
    }
    public function storeImage($model, $id=(-1)){

        if(request()->hasFile("image")){
            if($id!=(-1)){
                $update = $model->where(['id'=>$id])->update([
                    'image' => request()->image->store("blog","public")
                ]);
                $model = $model->where(['id'=>$id])->first();
            }else{
                $update = $model->update([
                    'image' => request()->image->store("blog","public")
                ]);
            }
            if($update){
                $image = Image::make(public_path("storage/".$model->image))->fit(350,298);
                $image->save(public_path("storage/s_".$model->image));
                $image = Image::make(public_path("storage/".$model->image))->fit(730,379);
                $image->save(public_path("storage/".$model->image));
                return true;
            }
        }else{
            return true;
        }
    }

    public function delete($id,Blog $model){
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
    public function edit(Blog $model,$id){
        $itemData = $model->where(['id'=>$id])->first();
        return view('blog.update_blog',compact('itemData'));
    }
    public function update(Blog $model, $id){
        $data = $this->validateData();
        $create_instance = $model->where(['id'=>$id])->update($data);
        if ($create_instance){
            if($this->storeImage($model,$id)){
                return back();
            }else
                return back();
        }else
            return back();
    }
}
