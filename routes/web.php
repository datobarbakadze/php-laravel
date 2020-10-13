<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/home','HomeController@index')->name("main");

//contact
Route::get('/contact',"ContactController@index")->name("contact");
Route::post('/contact/send',"ContactController@sendMail")->name("sendMail");


//about
Route::get('/about',"AboutController@index")->name("about");

/* ----------- Serivces routes */
Route::get('/services/{type}',"ServiceController@index")->name("services");
Route::get('/service/{service_id}',"ServiceController@show")->name("service");
Route::get('/services/search/{logos?}',"ServiceController@search")->name("serviceSearch");


//projects routes
Route::get('/projects/{status}',"ProjectController@index")->name("projects");
Route::get('/project/{project_id}',"ProjectController@show")->name("project");
Route::get('/projects/search/{logos?}',"ProjectController@search")->name("projectSearch");

//success sotry routes
Route::get('/success/',"SuccessController@index")->name("successes");
Route::get('/success/{story_id}',"SuccessController@show")->name("success");
Route::get('/success/search/{logos?}',"SuccessController@index")->name("successSearch");


//tours routes
Route::get('/tourisms/{status}',"TourController@index")->name("tours");
Route::get('/tourism/{tour_id}',"TourController@show")->name("tour");
Route::get('/tourisms/search/{logos?}',"TourController@search")->name("tourSearch");
//blog routes
Route::get('/blog',"BlogController@index")->name("blogs");
Route::get('/blog/{blog_id}',"BlogController@show")->name("blog");
Route::get('/blog/search/{logos?}',"BlogController@search")->name("blogSearch");

//publication
Route::get('/publication',"PublicationController@index")->name("publication");
Route::get('/publication/search/{logos?}',"PublicationController@search")->name("publicationSearch");


//video gallery route
Route::get('/video',"VideoController@index")->name("video");
Route::get('/video/search/{logos?}',"VideoController@search")->name("videoSearch");


//member routes
Route::get('/member',"MemberController@index")->name("member");
Route::post('/member/add',"MemberController@store")->name("addMember");


//photo gallery
Route::get('/gallery',"GalleryController@index")->name("gallery");



//test
Route::get('/test',"ServiceController@test");







Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);




/*---------------  ADMIN ROUTES  ------------------- */
Route::middleware('admin:1')->group(function (){
    // services admins
    Route::post('/service/add',"ServiceController@store")->name("addService");
    Route::post('/service/{id}',"ServiceController@delete")->name("delService");
    Route::get('/service/{id}/edit','ServiceController@edit')->name("editService");
    Route::post('/service/update/{id}','ServiceController@update')->name("updateService");

    // projects admins
    Route::post('/project/add',"ProjectController@store")->name("addProject");
    Route::post('/project/{id}',"ProjectController@delete")->name("delProject");
    Route::get('/project/{id}/edit','ProjectController@edit')->name("editProject");
    Route::post('/project/update/{id}','ProjectController@update')->name("updateProject");

    //success story admin routes
    Route::post('/success/add',"SuccessController@store")->name("addSuccess");
    Route::post('/success/{id}',"SuccessController@delete")->name("delSuccess");
    Route::get('/success/{id}/edit','SuccessController@edit')->name("editSuccess");
    Route::post('/success/update/{id}','SuccessController@update')->name("updateSuccess");

    //blog routes admin
    Route::post('/blog/add',"BlogController@store")->name("addBlog");
    Route::post('/blog/{id}',"BlogController@delete")->name("delBlog");
    Route::get('/blog/{id}/edit','BlogController@edit')->name("editBlog");
    Route::post('/blog/update/{id}','BlogController@update')->name("updateBlog");

    // tourism admins
    Route::post('/tourism/add',"TourController@store")->name("addTour");
    Route::post('/tourism/{id}',"TourController@delete")->name("delTour");
    Route::get('/tourism/{id}/edit','TourController@edit')->name("editTour");
    Route::post('/tourism/update/{id}','TourController@update')->name("updateTour");

    //gallery routes
    Route::post('/gallery/add',"GalleryController@store")->name("addGallery");
    Route::post('/gallery/{id}',"GalleryController@delete")->name("delGallery");

    //publication admin routes
    Route::post('/publication/add',"PublicationController@store")->name("addPublication");
    Route::post('/publication/{id}',"PublicationController@delete")->name("delPublication");

    //ckuploader
    Route::post('/main/ckupload',"MainController@CKUploader")->name("ckuploader");
    Route::post('/main/content',"MainController@addContent")->name("addContent");
    Route::get('/main/contents',"MainController@test")->name("addContent");

    // about page team routes
    Route::post("/about/team","AboutController@makeTeam")->name("makeTeam");
    Route::post("/about/{id}","AboutController@delete")->name("deleteTeam");

    //video gallery admin routes
    Route::post('/video/add',"VideoController@store")->name("addVideo");
    Route::post('/video/{id}',"VideoController@delete")->name("delVideo");

    //home admin routes
    Route::post("/home/addSlide","HomeController@addSlide")->name("addSlide");
    Route::post("/home/addFeedback","HomeController@addFeedback")->name("addFeedback");
    Route::post("/home/deleteFeedback/{id}","HomeController@deleteFeedback")->name("deleteFeedback");
    Route::post("/home/deleteSlide/{id}","HomeController@deleteSlide")->name("deleteSlide");

    //marking
    Route::post("/home/mark/{id}","HomeController@indexMarker")->name("mark");


    //table list
    Route::get('/member/list',"MemberController@list")->name("memberList");
    Route::get('logout', 'Auth\LoginController@logout')->name('logout');
});



