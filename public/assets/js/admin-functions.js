var updateCk = function(){
    for ( instance in CKEDITOR.instances ) {
        CKEDITOR.instances[instance].updateElement();
    }
}
var confFileUplaod = function(){

    for ( instance in CKEDITOR.instances ) {
        CKEDITOR.instances[instance].on("fileUploadRequest",function (evt) {
            var fileLoader = evt.data.fileLoader,
                formData = new FormData(),
                xhr = fileLoader.xhr;
            xhr.open( 'POST', fileLoader.uploadUrl, true );
            xhr.setRequestHeader( 'X-CSRF-TOKEN', $("meta[name='csrf-token']").attr("content") );
            formData.append( '_token',$("meta[name='csrf-token']").attr("content")  );
            formData.append('image', fileLoader.file, fileLoader.fileName);
            fileLoader.xhr.send( formData );

            evt.stop();
        },null,null,4);
    }

}
var genMsg = function(type,el,msg){
    $(el).addClass("alert-"+type).html(msg).slideDown(500);
    setTimeout(function () {
        $(el).slideUp(500).delay(1500).removeClass("alert-"+type).html("");
    },2000)
}
var genEditor = function(obj,editorCounter){



    content = obj.html()
    obj.attr('id', 'editableFormContainer_' + editorCounter);
    obj.html("<form action='/main/content' method='POST' id='"+editorCounter+"' class='cf dyn-form dynamic-form-" + editorCounter + "'>" +

        "<textarea name='general_editor_" + editorCounter + "' id='general_editor_" + editorCounter + "'></textarea>" +
        "<button type=\"submit\" id=\"submit\" name=\"submit\" data-editorId='" + editorCounter + "' class=\"cf-btn float-left\">განახლება</button>"+
        "&nbsp;<button class=' float-left cf-btn dynamic-form-exit' editorId='" + editorCounter + "'>დახურვა</button></form>");
    CKEDITOR.replace('general_editor_' + editorCounter);
    CKEDITOR.instances['general_editor_' + editorCounter].setData(content);
}


var dynamic_form_exit = function(exitButtonObj){
    var editorId = exitButtonObj.attr("editorId");
    var editorContent = CKEDITOR.instances['general_editor_'+editorId].getData();

    var formObj = $('.dynamic-form-'+editorId);
    var containerObj = $('#editableFormContainer_'+editorId);
    formObj.remove();
    containerObj.html(editorContent);
    containerObj.removeAttr("id");
    $("*[editorId='"+editorId+"']").addClass("editable");

}
var successFunction = function(response){
    console.log(response);
    if (response.error !== undefined) {
        if (response.error == "success") {
            if(response.item_id !== undefined){ // თუ item_id დააბრუნა ნიშნავს რომ წაშლის ოპერაცია მოხდა
                $("#item-"+response.item_id).hide(2000);
                return true;
            }
            if(response.itemId !== undefined){ // თუ itemId დააბრუნა ნიშნავს რომ მოხდა მონიშვნის ოპერაცია
                    $('#'+response.id_prefix+'-'+response.itemId).removeClass("btn-primary").removeClass("btn-danger");
                    $('#'+response.id_prefix+'-'+response.itemId).attr("command",response.newcommand)
                        .html(response.btnText)
                        .addClass(response.btnClass);

            }
            genMsg("success", ".msg-cont", response.errMsg);
            $('.admin-form').slideUp(1000);

        } else if (response.error == "error") {
            genMsg("warning", ".msg-cont", response.errMsg);
        } else {
            genMsg("dadnger", ".msg-cont", "გაურკვეველი შეცდომა დაუკავშირდით დეველოპერს");
        }
    }else{
        genMsg("dadnger",".msg-cont","გაურკვეველი შეცდომ დაუკავშირდით დეველოპერს");
    }
}
var errorFunction = function(data){
    genMsg("danger", ".msg-cont", data.resposneText);
}
var fillFields = function(){
    alert("filled");
}

var Req = function(url,data={},type="POST"){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url:url,
        type:type,
        dataType:"json",
        data:data,
        processData: false,
        contentType: false,
        success:function (response) { successFunction(response) },
        error: function(errData){ errorFunction(errData) }
    });
}
