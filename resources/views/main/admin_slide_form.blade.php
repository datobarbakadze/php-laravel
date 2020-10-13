<div class="form-group col col-sm-12 p-0">
    <button class="btn btn-info admin-form-btn p-3">სლაიდის დამატება</button>
</div>
<form action="{{ route("addSlide") }}" enctype="multipart/form-data"  class="form-group col-sm-6 admin-form hide-form slide-form" >
    <div class="float-right close-admin-form">
        <i class="fa fa-close"></i>
    </div>
    @csrf
    <textarea name="text" id="text" class="form-control"></textarea>
    <input type="file" name="image">
    <div class="form-group">
        <input type="submit" value="დამატება">
    </div>

</form>
