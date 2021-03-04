<!-- Type Field -->
<div class="row">
    <!-- Name Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('name', 'Название должности:') !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'autofocus' => 'autofocus','maxlength' => 255]) !!}
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('type', 'Тип должности:') !!}
        <select id="type" class="form-control" name="type" tabindex="-1">
            @foreach($types as $id => $type)
                <option value = "{{ $id }}" {{ (isset($position) && ($id == $position->type))?'selected':''}} >{{ $type }}</option>
            @endforeach
        </select>
    </div>

</div>
<div class="row">
    <!-- Submit Field -->
    <div class="form-group col-sm-12">
        {!! Form::submit('Сохранить', ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('positions.index') }}" class="btn btn-secondary">Отмена</a>
    </div>
</div>
