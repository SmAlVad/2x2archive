@extends('admin.layouts.app_admin')

@section('content')

    @if($message = Session::get('success'))

        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>

    @endif

    <a href="{{route('admin.pdf.create')}}" class="btn btn-primary float-right">
        <i class="fas fa-plus"></i>
        Добавить
    </a>

    <h3>Список PDF</h3>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Проект</th>
            <th>Имя файла</th>
            <th>Год</th>
            <th>Месяц</th>
            <th>День</th>
            <th>Номер</th>
            <th>Загружен</th>
            <th>Кем</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @forelse($pdfs as $pdf)
            <tr>
                <td>{{ $pdf->project->name }}</td>
                <td>{{ $pdf->file_name }}</td>
                <td>{{ $pdf->year }}</td>
                <td>{{ \App\Models\Pdf::getStringMonth($pdf->month) }}</td>
                <td>{{ $pdf->day }}</td>
                <td>{{ $pdf->number }}</td>
                <td>{{ $pdf->created_at }}</td>
                <td>{{ $pdf->created_by }}</td>
                <td>
                    <form action="{{route('admin.pdf.destroy', $pdf->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a class="btn btn-success" href="{{ route('admin.pdf.edit', $pdf->id) }}"><i class="fas fa-edit"></i></a>

                        <button type="submit" class="btn btn-danger" onclick="return confirm('Вы уверены?')"><i class="fas fa-trash-alt"></i></button>

                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="9" class="text-center">
                    <h4>Данные отсутствуют</h4>
                </td>
            </tr>
        @endforelse
        </tbody>
        <tfoot>
        <tr>
            <td colspan="9">
                <ul class="pagination float-right">
                    {{$pdfs->links()}}
                </ul>
            </td>
        </tr>
        </tfoot>
    </table>
@endsection