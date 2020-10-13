
<div class="form-group col col-sm-12">
    <button class="btn btn-info admin-form-btn p-3">დამატება</button>
</div>
<form action="{{ route("addPublication") }}" enctype="multipart/form-data"  class="form-group col-sm-12 admin-form hide-form" id="add-item-form">
    <div class="float-right close-admin-form">
        <i class="fa fa-close"></i>
    </div>
    @csrf
    <input type="text" name="title" class="mb-3 form-control p-4 store-input">

    <input type="file" name="pdf">
    <div class="form-group">
        <input type="submit" value="დამატება">
    </div>

</form>
