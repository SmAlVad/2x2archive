//>> Проверка размера загружаемого PDF файла
$('#pdf-file-input').on('change', function() {

    const maxFileSize = 20000000;
    const pdfFileSize = this.files[0].size;

    console.log(pdfFileSize);

    if(pdfFileSize > maxFileSize) {

        let size = pdfFileSize / 1000000;
        $('#file-size-alert').html('Размер файла ' + size.toFixed(1) + ' Мбайт, привышает допустимый').fadeIn(300);

    } else {

        $('#file-size-alert').fadeOut(300);

    }

});//<<


