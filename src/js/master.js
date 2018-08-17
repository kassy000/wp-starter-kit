// JavaScript Document

var bp = {
    pc:1220,
    site:959,
    tab: 767,
    sp: 560
};
jQuery(function ($) {
    var contentWidth = 960;

    $(function () {
        //resize
        $(window).resize(function () {
            resize();
        })
        resize();
        $('header').show();

        //slicknav
        $('nav').slicknav({
            label: "",
            beforeOpen: function () {
                $('.slicknav_bg').stop().fadeIn()
            },
            beforeClose: function () {
                $('.slicknav_bg').stop().fadeOut()
            }
        });

        $('.slicknav_menu').after('<div class="slicknav_bg"></div>');

        flexibility(document.documentElement);


    })


    function resize() {
        var headerMargin = 0;
        var minHeaderMargin = 10;
        var headerMarginRight = 48;
        var headerWidth = $('header').width();
        if ($(window).width() > bp['pc']){
            headerMargin = ($(window).width() - contentWidth) / 2 - headerWidth - headerMarginRight;
        }else{
            headerMargin = minHeaderMargin;
        }
        $('header').css({
            marginLeft: headerMargin + 'px'
        })
    }


})

