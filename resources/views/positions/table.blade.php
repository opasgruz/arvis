<div class="table-responsive-sm">
    <table class="table table-striped" id="positions-table">
        <thead>
            <tr>
                <th>Название</th>
                <th>Тип должности</th>
                <th colspan="2">Действия</th>
            </tr>
        </thead>
        <tbody>
        @foreach($positions as $position)
            <tr>
            <td>{{ $position->name }}</td>
                <td>{{ $types[$position->type] }}</td>
                <td>
                    {!! Form::open(['route' => ['positions.destroy', $position->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a title="Редактировать должность" href="{{ route('positions.edit', [$position->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit',  'title' => 'Удалить должность', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Удалить должность?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>