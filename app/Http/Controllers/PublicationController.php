<?php

namespace App\Http\Controllers;

use App\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class PublicationController extends Controller
{
    public function index(Publication $model){
        $publications = $model->orderBy('id','DESC')->paginate(30);
        return view('publication.publication',compact('publications'));
    }
    public function search(Publication $model,$logos){
        $publications = $model->where('title','like','%'.$logos.'%')->paginate(30);
        return view('publication.publication',compact('publications'));
    }
    public function delete($id,Publication $model){
        $filePath = $model->where(["id"=>$id])->pluck("pdf")->first();
        if(File::exists(public_path("storage/".$filePath)))
            File::delete(public_path("storage/".$filePath));
        if(File::exists(public_path("storage/s_".$filePath)))
            File::delete(public_path("storage/s_".$filePath));
        if($model->where(["id"=>$id])->delete()){
            return response()->json(["error"=>"success","item_id"=>$id]);
        }else
            return response()->json(["error"=>"error","errMsg"=>"ვერ მოხერხდა ბაზიდან წაშლა"]);
    }
    public function store(Request $request, Publication $model){
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
            "pdf"=>"required|mimes:pdf|max:10000",
        ]);
    }
    public function storeImage($model){

        if(request()->hasFile("pdf")){

            $update = $model->update([
                'pdf' => request()->file('pdf')->store("publication","public")
            ]);
            if($update){

                return true;
            }
        }else{
            return true;
        }
    }
}
