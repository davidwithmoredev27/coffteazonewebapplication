$(document).ready(function() {
    $(".button-collapse").sideNav({
        edge: 'left',
        menuWidth: 200,
    });

    $(".slider").slider();
    $('.carousel').carousel();
    $('.carousel.carousel-slider').carousel({
        indicators: true,
        duration: 500,

        fullWidth: true,
    });
    $('select').material_select();
    $('.materialboxed').materialbox();
    $('.modal').modal({
        opacity: .0
    });
    $("textarea#slidereditdecription").characterCounter();
    $('.tooltipped').tooltip({
        delay: 50,
        html: true,
    });
});