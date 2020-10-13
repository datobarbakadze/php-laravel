
var scrollToDiv = function(divId){
    $('html, body').animate({
        scrollTop: $("#"+divId).offset().top-50
    }, 2000);
}

var IndexSlider = function(){
    $('#rev_slider_1').show().revolution({

        sliderLayout: 'hebe',
        delay:3000,

        navigation: {

            arrows: {
                enable: true,
                style: 'zeus',
                hide_onleave: false,
                tmp: '<div class="tp-title-wrap"><div class="tp-arr-imgholder"></div></div>',
            },
            bullets: {
                hide_onleave: false,
                enable: true,
                style: 'metis',
                tmp: '<span class="tp-bullet-img-wrap"><span class="tp-bullet-image"></span></span>',
                Alignment: 'center',
                h_align: "center",
                v_align: "bottom"
            }

        },
        responsiveLevels: [1240, 1024, 778, 480],
        visibilityLevels: [1240, 1024, 778, 480],
        gridwidth: [1240, 1024, 778, 480],
        gridheight: [660, 550, 500, 400],

    });
}

