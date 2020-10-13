<div class="form-group col col-sm-12">
    <button class="btn btn-info admin-form-btn p-3">დამატება</button>
</div>
<form action="{{ route("addTour") }}" enctype="multipart/form-data"  class="form-group col-sm-12 admin-form hide-form" id="add-item-form">
    <div class="float-right close-admin-form">
        <i class="fa fa-close"></i>
    </div>
    @csrf
    <input type="text" name="title" class="mb-3 form-control p-4 store-input">
    <textarea name="description" id="description" class="form-control"></textarea>
    <select class="mt-3 mb-2form-control p-4 store-select" name="status" id="store-select">
        <option  disabled selected >ტურიზმის ტიპი</option>
        <option value="tour">ტურები</option>
        <option value="hotel">სასტუმროები</option>
        <option value="agro">აგროტურისტული მეურნეობები</option>
        <option value="village">სოფლის ტურიზმი</option>
    </select>
    <input type="file" name="image">
    <div class="form-group">
        <input type="submit" value="დამატება">
    </div>

</form>
