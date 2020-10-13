$(document).ready(function() {

    var token = $("meta[name='csrf-token']").attr("content");
    $(document).on('click','.editable',function (ev) {
        ev.stopPropagation();
        $(this).removeClass("editable");
        var editorCounter = $(this).attr('editorId')

        genEditor($(this), editorCounter);
    });

    $(document).on('click', '.dynamic-form-exit', function (ev) {
        ev.stopPropagation();
        dynamic_form_exit($(this))
    });
    $("#add-item-form").submit(function (event) {
        event.preventDefault();
        updateCk();
        var url = $(this).attr("action");
        var data =new FormData($(this)[0]);
        console.log(data);
        Req(url,data,"POST");

    })
    $(document).on('click','.admin-form-btn',function(){
        $('.admin-form').slideDown(1000);
    });
    $(document).on('click','.close-admin-form',function(){
        $('.admin-form').slideUp(1000);
    });
    $(document).on('click','.show-team-form',function(){
        $('#team-form').slideDown(1000);
    });
    $(document).on('click','.close-team-form',function(){
        $('#team-form').slideUp(1000);
    });
    $(document).on('click','.delete-button',function(){
        var url =  $(this).data("action");
        Req(url);
    });
    $(document).on('submit','.dyn-form',function (event) {
        event.preventDefault();
        updateCk();
        var textareaName = $(this).find("textarea").attr("name");
        var url = $(this).attr("action");

        var page = $('#page').val();
        var content = CKEDITOR.instances[textareaName].getData();
        var content_id = parseInt($(this).attr("id"));
        var token  = $('meta[name="csrf-token"]').attr('content');
        // console.log($(this).find("textarea").attr("name"));
        // alert(url);
        // alert(page);
        var data =new FormData();
        data.append("page",page);
        data.append("content",content);
        data.append("content_id",content_id);
        data.append("_token",token);

        // data.append('page',page)
        // console.log(data);
         Req(url,data,"POST");

    })
    $("#team-form").submit(function (event) {
        event.preventDefault();
        var token  = $('meta[name="csrf-token"]').attr('content');
        var data = new FormData($(this)[0]);
        data.append('_token',token);
        var url = $(this).attr("action");
        Req(url,data,'POST');
    });
    $(document).on('click','.delete-team',function(){
        var url =  $(this).data("action");
        Req(url);
    });
    $(document).on('submit','.slide-form',function(event){
        event.preventDefault();
        var url = $(this).attr('action');
        var data = new FormData($(this)[0]);
        Req(url,data,'POST');
    });
    $(document).on("click",'.delete-slide',function(){
        var url = $(this).attr("action");
        Req(url);
    });
    $(document).on('submit','.feedback-form',function(event){
        event.preventDefault();
        var url = $(this).attr('action');
        var data = new FormData($(this)[0]);
        Req(url,data,'POST');
    });
    $(document).on("click",'.delete-feedback',function(){
        var url = $(this).attr("action");
        Req(url);
    });
    $(document).on("click",'.service-mark-btn',function(){
        var url = $(this).attr("action");
        var command = $(this).attr("command");
        var id = $(this).attr("itemId");
        var section = $(this).attr("section");
        var data = new FormData();
        data.append('command',command);
        data.append('id',id);
        data.append('section',section);
        Req(url,data);
    });


    confFileUplaod();
});
