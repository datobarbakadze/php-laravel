<?php

namespace App\Http\Controllers;

use App\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class SuccessController extends Controller
{
    public function index(){
        $stories = Success::orderBy("id","DESC")->paginate(6);

        return view("success.success",compact('stories'));
    }
    public function search(Success $model,$logos){
        $stories = $model->where('title','like','%'.$logos.'%')->paginate(6);
        return view("success.success",compact('stories'));
    }
    public function show($id){
        $story = Success::where("id",$id)->first();
        if(!is_null($story)){
            return view("success.success_single",compact('story'));
        }else
            abort(404);

    }

    public function store(Request $request, Success $model){
        $data = $this->validateData();

        $create_instance = $model->create($data);

        if ($create_instance){

            if($this->storeImage($create_instance)){

                return response()->json(["error"=>"success","errMsg"=>"წარმატებული დამატება","data"=>$data]);
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
                    'image' => request()->image->store("story","public")
                ]);
                $model = $model->where(['id'=>$id])->first();
            }else{
                $update = $model->update([
                    'image' => request()->image->store("story","public")
                ]);
            }
            if($update){
                $image = Image::make(public_path("storage/".$model->image))->fit(730,379);
                $image->save(public_path("storage/s_".$model->image),30);
                $image = Image::make(public_path("storage/".$model->image))->fit(730,379);
                $image->save(public_path("storage/".$model->image),90);
                return true;
            }
        }else{
            return true;
        }
    }

    public function delete($id,Success $model){
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
    public function edit(Success $model,$id){
        $itemData = $model->where(['id'=>$id])->first();
        return view('success.update_success',compact('itemData'));
    }
    public function update(Success $model, $id){
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
