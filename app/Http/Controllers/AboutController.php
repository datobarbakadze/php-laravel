<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;
use App\Content;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class AboutController extends Controller
{
    public function index(Team $model){
        $team = $model::all();
        return view("about.about",["data"=>new AboutController,'teams'=>$team]);
    }
    public function getText($id){
        $model = new Content();
        $item = $model->where(["page"=>"about",'content_id'=>$id])->first();

        return $item;
    }
    public function makeTeam(Team $model){

        $data = $this->teamValidation();
        $create_instance = $model->create($data);

        if ($create_instance){

            if($this->storeImage($create_instance)){
                return response()->json(["error"=>"success","errMsg"=>"წარმატებული დამატება","data"=>$data]);
            }else
                return response()->json(["error"=>"success","errMsg"=>"სურათის ატვირთვა ვერ ხერხდება"]);
        }else
            return response()->json(["error"=>"error","errMsg"=>"ბაზაში დამატებე ვერ ხერხდება"]);



    }

    public function teamValidation(){

         return request()->validate([
            'full_name'=>'required',
            'position'=>'required',
            'image'=>'required|file|image|max:10000',
            'facebook'=>'',
            'googleplus'=>'',
            'twitter'=>'',
            'pinterest'=>'',
            'linkedin'=>'']);

    }
    public function storeImage($model){

        if(request()->hasFile('image')){
            $update = $model->update([
                'image'=>request()->image->store('team','public')
            ]);
        }
        if($update){

            $image = Image::make(public_path("storage/".$model->image))->fit(340,354);
            $image->save(public_path("storage/".$model->image),90);
            return true;
        }else
            return false;
    }
    public function delete($id,Team $model){

        $imagePath = $model->where(["id"=>$id])->pluck("image")->first();
        if(File::exists(public_path("storage/".$imagePath)))
            File::delete(public_path("storage/".$imagePath));
        if($model->where(["id"=>$id])->delete()){
            return response()->json(["error"=>"success","item_id"=>$id]);
        }else
            return response()->json(["error"=>"error","errMsg"=>"ვერ მოხერხდა ბაზიდან წაშლა"]);
    }
}
