<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
class ProjectController extends Controller
{
    public function index($status){

        if(!isset($status) || empty($status))
            return redirect()->route("main");
        if($status=="current"){
            $projects = Project::current()->paginate(6);
        }elseif($status=="finished"){
            $projects = Project::finished()->paginate(6);
        }elseif($status=="all"){
            $projects = Project::orderBy("id","DESC")->paginate(6);
        }else{
            return redirect()->route("main");
        }

        return view("projects.projects",compact('projects'));
    }
    public function search(Project $model,$logos){
        $projects = $model->where('title','like','%'.$logos.'%')->paginate(6);
        return view("projects.projects",compact('projects'));
    }
    public function show($id){
        $project = Project::where("id",$id)->first();
        return view("projects.projects_single",compact('project'));
    }

    public function store(Request $request, Project $model){
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
            "status"=>"required",
            "image"=>"sometimes|file|image|max:10000",
        ]);
    }
    public function storeImage($model, $id=(-1)){

        if(request()->hasFile("image")){
            if($id!=(-1)){
                $update = $model->where(['id'=>$id])->update([
                    'image' => request()->image->store("uploads","public")
                ]);
                $model = $model->where(['id'=>$id])->first();
            }else{
                $update = $model->update([
                    'image' => request()->image->store("uploads","public")
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

    public function delete($id,Project $model){
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
    public function edit(Project $model,$id){
        $itemData = $model->where(['id'=>$id])->first();
        return view('projects.update_project',compact('itemData'));
    }
    public function update(Project $model, $id){
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
