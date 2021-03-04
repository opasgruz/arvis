<div class="table-responsive-sm" id="workers-container">
    <table class="table table-striped" id="workers-table">
        <thead>
            <tr>
                <th>Ф.И.О.</th>
                <th>Должность</th>
                <th>Филиал</th>
                <th colspan="2">Действия</th>
            </tr>
        </thead>
        <tbody>
        @foreach($workers as $worker)
            <tr>
                <td>{{ $worker->fio }}</td>
                <td>{{ $worker->position->name }}</td>
                <td>{{ empty($worker->filial) ? '' : $worker->filial->name }}</td>
                <td>
                    {!! Form::open(['route' => ['workers.destroy', $worker->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a title="Редактировать сотрудника" href="{{ route('workers.edit', [$worker->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'title' => 'Удалить сотрудника','class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Удалить сотрудника?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>