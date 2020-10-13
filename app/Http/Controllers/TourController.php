<?php

namespace App\Http\Controllers;

use App\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class TourController extends Controller
{


    public function index($status){

        if(!isset($status) || empty($status))
            return redirect()->route("main");
        if($status=="tour"){
            $tours = Tour::tour()->paginate(6);
            $statusMsg = "ტური";

        }elseif($status=="hotel"){
            $tours = Tour::hotel()->paginate(6);
            $statusMsg = "სასტუმრო";
        }elseif($status=="agro"){
            $tours = Tour::agro()->paginate(6);
            $statusMsg = "აგროტურისტული მეურნეობა";
        }elseif($status=="village"){
            $tours = Tour::village()->paginate(6);
            $statusMsg = "სოფლის ტურიზმი";
        }else{
            return redirect()->route("main");
        }
        return view("tourism.tours",compact('tours','statusMsg'));
    }
    public function search(Tour $model,$logos){
        $statusMsg = "ტურისტული ობიექტი";
        $tours = $model->where('title','like','%'.$logos.'%')->paginate(6);
        return view("tourism.tours",compact('tours','statusMsg'));
    }
    public function show($id){
        $tour = Tour::where("id",$id)->first();
        return view("tourism.tours_single",compact('tour'));
    }
    public function store(Request $request, Tour $model){
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

    public function delete($id,Tour $model){
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
    public function edit(Tour $model,$id){
        $itemData = $model->where(['id'=>$id])->first();
        return view('tourism.update_tourism',compact('itemData'));
    }
    public function update(Tour $model, $id){
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
