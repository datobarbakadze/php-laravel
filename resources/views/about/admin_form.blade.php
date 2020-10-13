<div class="btn btn-primary show-team-form"><h6>გუნდის წევრის დამატება</h6></div>
<form action="{{ route("makeTeam") }}" class="form-group" method="POST" id="team-form">
    <div class="float-right form-close close-team-form">
        <i class="fa fa-close"></i>
    </div>
    <div>
        <label for="name">სრული სახელი</label>
        <input type="text" class="form-control py-4" name="full_name" id="name">
    </div>
    <div>
        <label for="position">პოზიცია</label>
        <input type="text" class="form-control py-4" name="position" id="position">
    </div>
    <div>
        <label for="googleplus">google+ ლინკი</label>
        <input type="text" class="form-control py-4" name="googleplus" id="googleplus">
    </div>
    <div>
        <label for="facebook">facebook ლინკი</label>
        <input type="text" class="form-control py-4" name="facebook" id="facebook">
    </div>
    <div>
        <label for="twitter">twitter ლინკი</label>
        <input type="text" class="form-control py-4" name="twitter" id="twitter">
    </div>
    <div>
        <label for="pinterest">pinterest ლინკი</label>
        <input type="text" class="form-control py-4" name="pinterest" id="pinterest">
    </div>
    <div>
        <label for="linkedin">Linkerdin ლინკი</label>
        <input type="text" class="form-control py-4" name="linkedin" id="linkedin">
    </div>
    <div>
        <label for="image">გუნდის წევრის სურათი</label><br>
        <input type="file"  name="image" id="image">
    </div>
    <div>
        <button type="submit" class="btn btn-primary py-4 px-4 mt-2" ><h6>გუნდის წევრის დამატება</h6></button>
    </div>

</form>
