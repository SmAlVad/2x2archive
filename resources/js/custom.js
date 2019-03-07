$(document).ready(function () {

    //>> Страница выбора категории обьявления
    $('.advert-category').on('click', function () {
        $(this).next().slideToggle();
    });//<<



    //>> Скрыть/показать панель навигации покатегориям в поиске обьявлений
    $('#right-slide-menu-btn').on('click', function () {
        $('#right-slide-nav').show();
    });

    $('#closebtn').on('click', function () {
        $('#right-slide-nav').hide();
    });//<<




    //>> Маски для полей ввода выставления счета
    const Inputmask = require('inputmask');

    const im9       = new Inputmask("999999999");
    const im10      = new Inputmask("9999999999");
    const im20      = new Inputmask("99999999999999999999");
    const imPhone   = new Inputmask("+7 (999) 999-99-99");

    im9.mask($('#bill-kp'));
    im9.mask($('#bill-bik'));
    im10.mask($('#bill-inn'));
    im20.mask($('#bill-account'));
    im20.mask($('#bill-ks'));
    imPhone.mask($('#bill-phone'));//<<



    //>> Slick slider
    $('.slider').slick({
        infinite: true,
        autoplay: true,
        autoplaySpeed: 5000,
    });//<<

});
