<?php

namespace App\Http\Controllers;

use App\Content;
use App\Feedback;
use App\Gallery;
use App\Service;
use App\Slide;
use App\Blog;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class HomeController extends Controller
{
    private $servicesDB;
    private $galleryDB;
    private $feedbackDB;
    private $slideDB;
    private $blogDB;
    public function __construct(){
        $this->servicesDB = new Service();
        $this->galleryDB = new Gallery();
        $this->feedbackDB = new Feedback();
        $this->slideDB = new Slide();
        $this->blogDB = new Blog();
    }

    public function index(){

        $allServices = $this->getAllServices($this->servicesDB);
        $markedServices = $this->getMarkedServices($this->servicesDB);
        $allGallery = $this->getAllGallery($this->galleryDB);
        $markedGallery = $this->getMarkedGallery($this->galleryDB);
        $allBlogs = $this->getAllBlog($this->blogDB);
        $markedBlogs = $this->getMarkedBlog($this->blogDB);
        $feedbacks = $this->getFeedbacks($this->feedbackDB);
        $slides = $this->getSlides($this->slideDB);
        return  view('main.main',
                compact('allServices','markedServices',
                                'allGallery','markedGallery',
                                'allBlogs','markedBlogs',
                                'feedbacks','slides'),["data"=>new HomeController]);
    }

    public function getText($id){
        $model = new Content();
        $item = $model->where(["page"=>"main",'content_id'=>$id])->first();

        return $item;
    }


    /*---- slides begining ----*/
    public function addSlide(Slide $model){
        $data = $this->validateSlide();
        $create_instance = $model->create($data);
        if($create_instance){
            if($this->storeImage($create_instance,'slide',1366,683)){
                return response()->json(["error"=>"success","errMsg"=>"სლაიდი წარმატებით დაემატა"]);
            }else
                return response()->json(["error"=>"error","errMsg"=>"სურათის დამატება ვერ ხერხდება"]);
        }else
            return response()->json(["error"=>"error","errMsg"=>"ბაზაში დამატება ვერ ხერხდება"]);

    }
    public function validateSlide(){
        return request()->validate([
            'text'=>'',
            'image'=>'required|file|max:10000'
        ]);
    }
    public function deleteSlide(Slide $model,$id){
        $imagePath = $model->where(["id"=>$id])->pluck("image")->first();
        if(File::exists(public_path("storage/".$imagePath)))
            File::delete(public_path("storage/".$imagePath));
        if($model->where(["id"=>$id])->delete()){
            return response()->json(["error"=>"success","errMsg"=>"slide-ი წარმატებით წაიშალა"]);
        }else
            return response()->json(["error"=>"error","errMsg"=>"ვერ მოხერხდა ბაზიდან წაშლა"]);
    }
    public function getSlides($model){
        return $model->all();
    }
    /*------ slides finish ------*/


    /*----- feedback begining ----*/
    public function addFeedback(Feedback $model){
        $data = $this->validateFeedback();
        $create_instance = $model->create($data);
        if($create_instance){
            if($this->storeImage($create_instance,'feedback',44,44)){
                return response()->json(["error"=>"success","errMsg"=>"feedback-ი წარმატებით დაემატა"]);
            }else
                return response()->json(["error"=>"error","errMsg"=>"სურათის დამატება ვერ ხერხდება"]);
        }else
            return response()->json(["error"=>"error","errMsg"=>"ბაზაში დამატება ვერ ხერხდება"]);

    }
    public function validateFeedback(){
        return request()->validate([
            "name"=>'required',
            "position"=>'',
            "text"=>'required',
            "image"=>'required|file|max:10000',
        ]);
    }
    public function deleteFeedback(Feedback $model,$id){
        $imagePath = $model->where(["id"=>$id])->pluck("image")->first();
        if(File::exists(public_path("storage/".$imagePath)))
            File::delete(public_path("storage/".$imagePath));
        if($model->where(["id"=>$id])->delete()){
            return response()->json(["error"=>"success","errMsg"=>"feedback-ი წარმატებით წაიშალა"]);
        }else
            return response()->json(["error"=>"error","errMsg"=>"ვერ მოხერხდა ბაზიდან წაშლა"]);
    }
    public function getFeedbacks($model){
        return $model->all();
    }
    /*--- end of feedback ----*/


    /*---- services begining -----*/
    public function getAllServices($model){
        return $model->get(['id','title','mark']);

    }
    public function getMarkedServices($model){
        return $model->getmarked();

    }
    public function indexMarker($id){

        $data = request()->validate([
            "command"=>'required',
            'section'=>'required'
        ]);
        switch ($data["section"]){
            case "service":
                $model = $this->servicesDB;
                break;
            case "blog":
                $model = $this->blogDB;
                break;
            case "gallery":
                $model = $this->galleryDB;
                break;
            default:
                return response()->json(["error"=>"error","errMsg"=>"არასწორი სექცია"]);
                braek;
        }
        $check = $model->where(["id"=>$id])->first();
        if(!is_null($check)){
            if ($data["command"]=="mark")
                $update = $model->where(['id'=>$id])->update(['mark'=>1]);
            elseif ($data["command"]=="unmark")
                $update = $model->where(['id'=>$id])->update(['mark'=>0]);
            else
                return response()->json(["error"=>"error","errMsg"=>"არასწორი ბრძანება"]);
            if($update){
                return response()->json(["error"=>"success",
                    "errMsg"=>"სერვისი წარმატებით მოინიშნა",
                    'id_prefix'=>$data["section"],'btnClass'=>$data["command"]=="mark" ? "btn-danger" : "btn-primary",
                    'newcommand'=>$data["command"]=="mark" ? "unmark" : "mark",
                    'itemId'=>$id,"btnText"=>$data["command"]=="mark" ? "განიშვნა" : "მონიშვნა"]);
            }
        }else
            return response()->json(["error"=>"error","errMsg"=>"ასეთი სერვის არ იძებნება"]);

    }
    /*--- services finish -----*/


    /*---- gallery begining ----*/
    public function getAllGallery($model){
        return $model->get(['id','image','mark']);
    }
    public function getMarkedGallery($model){
        return $model->getmarked();
    }
    /*----- gallery finish ------*/


    /*----- blog begining -----*/
    public function getAllBlog($model){
        return $model->get(['id','title','mark']);
    }
    public function getMarkedBlog($model){
        return $model->getmarked();
    }
    /*------ blog finish-----*/


    public function storeImage($model,$folder,$width,$height){
        if (request()->hasFile("image")){
            $update = $model->update([
                "image"=>request()->image->store($folder,'public')
            ]);
        }
        if ($update){
            $image = Image::make(public_path('storage/'.$model->image))->fit($width,$height);
            $image->save(null,90);
            return true;
        }else
            return false;
    }
}
