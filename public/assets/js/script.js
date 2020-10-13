$(document).ready(function(){
    editorCounter = 0;
    if(location.hash) {
        var id = location.hash.replace('#', '');
        scrollToDiv(id);
    }
    if ($('.revSlideHero1').length > 0){
        IndexSlider();
    }
    $(document).on('submit','.search-from',function(event){
        event.preventDefault();
        var path = $('#search-select option:selected').attr("value");
        var logos = $('#logos').val();
        var url = path+"/"+logos;
        window.location.href = url;
    });

});
