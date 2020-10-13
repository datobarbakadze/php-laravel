
<div class="form-group col col-sm-12">
    <button class="btn btn-info admin-form-btn p-3">დამატება</button>
</div>
<form action="{{ route("addVideo") }}" enctype="multipart/form-data"  class="form-group col-sm-12 admin-form hide-form" id="add-item-form">
    <div class="float-right close-admin-form">
        <i class="fa fa-close"></i>
    </div>
    @csrf
    <label for="title" ><h6>სათაური</h6></label>
    <input type="text" name="title" id="title" class="mb-3 form-control p-4 store-input">
    <label for="url"><h6>ვიდეოს ლინკი</h6></label>
    <input type="text" name="url"  id="url" class="form-control">
    <div class="form-group">
        <input type="submit" value="დამატება">
    </div>

</form>
