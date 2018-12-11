@if($errors->any())

    <div class="alert alert-danger">
        <p>Произошли проблемы при сохранении</p>
        <ul>
            @foreach($errors as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>

@endif