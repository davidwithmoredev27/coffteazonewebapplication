$(document).ready(function() {
    $(".button-collapse").sideNav({
        edge: 'left',
    });
    $(".slider").slider();
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