<form action="{{ route('admin.payment-methods.upload-image') }}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <input type="file" name="image">
        <button class="btn btn-primary float-right" type="submit">Загрузить изображение</button>
    </div>
</form>