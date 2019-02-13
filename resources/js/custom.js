$(document).ready(function () {

    $('.advert-category').on('click', function () {
        $(this).next().slideToggle();
    });

    $('#right-slide-menu-btn').on('click', function () {
        $('#right-slide-nav').show();
    });

    $('#closebtn').on('click', function () {
        $('#right-slide-nav').hide();
    });

});