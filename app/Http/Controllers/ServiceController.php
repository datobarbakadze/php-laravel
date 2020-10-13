<?php

namespace App\Http\Controllers;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Service;
use Facade\Ignition\Support\Packagist\Package;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Intervention\Image\Facades\Image;

class ServiceController extends Controller
{

    public function index($type){
        if(!isset($type) || empty($type))
            return redirect()->route("main");
        if($type=="training"){
            $typeMsg = "ტრენინგი";
        }elseif($type=="service"){
            $typeMsg="სერვისი";
        }elseif($type=="farmer"){
            $typeMsg="ფერმერთა მომსახურება";
        }else{
            return redirect()->route("main");
        }
        $services = Service::orderBy("id","DESC")->where("type",$type)->paginate(6);
        return view("services.services",compact('services','typeMsg'));
    }
    public function search(Service $model,$logos){
        $typeMsg = "სერვისი";
        $services = $model->where('title','like','%'.$logos.'%')->paginate(6);
        return view("services.services",compact('services','typeMsg'));
    }
    public function show($id){
        $service = Service::where("id",$id)->first();
        return view("services.services_single",compact('service'));
    }
    public function store(Request $request, Service $model){
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
            "type"=>"required",
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

    public function delete($id,Service $model){
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
    public function edit(Service $model,$id){
        $itemData = $model->where(['id'=>$id])->first();
        return view('services.update_service',compact('itemData'));
    }
    public function update(Service $model, $id){
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

    public function test(Service $model){
        $data = request()->validate([
            "hi"=>"sometimes"
        ]);
//        $imagePath = $model->where(["id"=>2])->pluck("image")->first();
//        echo $imagePath;
    }
}
