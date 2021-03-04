<div class="row">
    <!-- Lastname Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('lastname', 'Фамилия:') !!}
        {!! Form::text('lastname', null, ['class' => 'form-control', 'autofocus' => 'autofocus','maxlength' => 255]) !!}
    </div>

    <!-- Firstname Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('firstname', 'Имя:') !!}
        {!! Form::text('firstname', null, ['class' => 'form-control','maxlength' => 255]) !!}
    </div>

    <!-- Middlename Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('middlename', 'Отчество:') !!}
        {!! Form::text('middlename', null, ['class' => 'form-control','maxlength' => 255]) !!}
    </div>
</div>
<div class="row">
    <!-- Filial Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('filial_id', 'Филиал:') !!}
        <select id="filial_id" class="form-control" name="filial_id" tabindex="-1">
            @foreach($filials as $filial)
                <option value = "{{ $filial['id'] }}" {{ (isset($worker) && ($filial['id'] == $worker->filial_id))?'selected':'' }} >{{ $filial['name'] }}</option>
            @endforeach
        </select>
    </div>

    <!-- Position Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('position_id', 'Должность:') !!}
        <select id="position_id" class="form-control" name="position_id" tabindex="-1">
            @foreach($positions as $position)
                <option value = "{{ $position['id'] }}" {{ (isset($worker) && ($position['id'] == $worker->position_id))?'selected':'' }} >{{ $position['name'] }}</option>
            @endforeach
        </select>
    </div>

</div>
<div class="row">
    <!-- Submit Field -->
    <div class="form-group col-sm-12">
        {!! Form::submit('Сохранить', ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('workers.index') }}" class="btn btn-secondary">Отмена</a>
    </div>
</div>
