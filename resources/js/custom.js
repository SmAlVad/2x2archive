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

  const im9 = new Inputmask("999999999");
  const im10 = new Inputmask("9999999999");
  const im20 = new Inputmask("99999999999999999999");
  const imPhone = new Inputmask("+7 (999) 999-99-99");

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


  //>> Flash сообщение
  let flash = $('.flash');

  if (flash.length > 0) {
    flash.addClass('flash-active');

    setTimeout(function () {
      flash.removeClass('flash-active')
    }, 5000);
  }//<<


  //>> Проверка даты в поиске обьявлений
  $('#end-date').on('change', function () {
    if (this.value === '') {
      this.value = getEndDate();
    }
  });

  $('#start-date').on('change', function () {

    let date = new Date(this.value);
    let endDate = $('#end-date');

    let year = date.getFullYear();
    let month = getConvertMonthIndex(date.getMonth() + 1);
    let day = (date.getDate() < 10) ? '0' + date.getDate() : date.getDate();

    endDate.attr({
      "max": `${year}-${month}-${day}`,
      "value": `${year}-${month}-${day}`
    });

    endDate.val(`${year}-${month}-${day}`);

  });

});

function getEndDate() {
  let startDate = $('#start-date');
  let inputValue = startDate.val().split('-');

  let year = inputValue[0];

  let month = parseInt(inputValue[1]) + 1;
  if (month < 10) {
    month = '0' + month;
  }

  let day = inputValue[2];

  let endDate = new Date(startDate.val());
  let today = new Date();

  if (today < endDate) {

    year = today.getFullYear();
    month = getConvertMonthIndex(today.getMonth());

    day = today.getDate();
    if (day < 10) {
      day = '0' + day;
    }
  }

  return `${year}-${month}-${day}`;
}


function getConvertMonthIndex(month) {

  switch (month) {
    case 1: return '02';
    case 2: return '03';
    case 3: return '04';
    case 4: return '05';
    case 5: return '06';
    case 6: return '07';
    case 7: return '08';
    case 8: return '09';
    case 9: return '10';
    case 10: return '11';
    case 11: return '12';
    case 12: return '01';
  }

}
