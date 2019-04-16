@extends('admin.layouts.app_admin')

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <h2>Пользователи</h2>
      </div>
      <div class="col-12">
        @include('admin.partials.success')
      </div>
    </div>
    @can('role-list')
      <div class="row bg-only-admin">
        <div class="col-10 text-white">
          Панель только для админа
        </div>
        <div class="col-2">
          <div class="admin-only-panel">
            <a href="{{route('admin.user.create')}}" class="btn btn-primary">
              <i class="fas fa-plus"></i>
              Добавить
            </a>
          </div>
        </div>
      </div>
    @endcan
    <div class="row">
      <div class="col-12">
        <table class="table table-striped">
          <tr>
            <th>No</th>
            <th>Имя</th>
            <th>Почта</th>
            <th>Подтверждена?</th>
            <th>Роль</th>
            @can('role-list')
              <th>Действия</th>
            @endcan
          </tr>

          @foreach ($data as $key => $user)
            <tr>
              <td>{{ ++$i }}</td>
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              <td>
                @if($user->email_verified_at === null)
                  <form action="{{route('admin.user.verified-email', $user->id)}}" method="post">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-warning" onclick="return confirm('Вы уверены?')">Подтвердить</button>
                  </form>
                @else
                  <span class="badge badge-success">ДА</span>
                @endif
              </td>
              <td>
                @if(!empty($user->getRoleNames()))
                  @foreach($user->getRoleNames() as $v)
                    <label class="badge badge-success">{{ $v }}</label>
                  @endforeach
                @endif
              </td>
              @can('role-list')
                <td>
                  <form action="{{route('admin.user.destroy', $user->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <a class="btn btn-success" href="{{ route('admin.user.edit', $user) }}"><i
                        class="fas fa-edit"></i></a>

                    <button type="submit" class="btn btn-danger" onclick="return confirm('Вы уверены?')"><i class="fas fa-trash-alt"></i>
                    </button>

                  </form>
                </td>
              @endcan
            </tr>
          @endforeach
        </table>

        {!! $data->render() !!}
      </div>
    </div>
  </div>
@endsection
