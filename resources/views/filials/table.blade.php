<div class="table-responsive-sm">
    <table class="table table-striped" id="filials-table">
        <thead>
            <tr>
                <th>Название</th>
                <th>Количество сотрудников</th>
                <th>Описание</th>
                <th colspan="2">Действия</th>
            </tr>
        </thead>
        <tbody>
        @foreach($filials as $filial)
            <tr>
                <td>{{ $filial->name }}</td>
                <td>
                    {{ $filial->workersCount }}
                    <button class="btn btn-primary pull-right filial-workers" data-filial_id="{{ $filial->id }}" type="button">Подробнее</button>
                </td>
                <td>{{ $filial->description }}</td>
                <td>
                    {!! Form::open(['route' => ['filials.destroy', $filial->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('filials.edit', [$filial->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Удалить филиал?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>