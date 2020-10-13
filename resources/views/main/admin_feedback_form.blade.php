<div class="form-group col col-sm-12 p-0">
    <button class="btn btn-info admin-form-btn p-3">feedback-ის დამატება</button>
</div>
<form action="{{ route("addFeedback") }}" enctype="multipart/form-data"  class="form-group col-sm-6 admin-form hide-form feedback-form" >
    <div class="float-right close-admin-form">
        <i class="fa fa-close"></i>
    </div>
    @csrf
    <label for="name">სახელი</label>
    <input type="text" class="form-control" name="name" id="name">
    <label for="position">პოზიცია</label>
    <input type="text" class="form-control" name="position" id="position">
    <label for="text">კომენტარი</label>
    <textarea name="text" id="text" class="form-control" ></textarea>
    <label for="image">სურათ</label><br>
    <input type="file" name="image" id="image">
    <div class="form-group">
        <input type="submit" value="დამატება">
    </div>

</form>
