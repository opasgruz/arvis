<div class="row">
    <!-- Name Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('name', 'Название:') !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'autofocus' => 'autofocus','maxlength' => 255,'maxlength' => 255]) !!}
    </div>

    <!-- Description Field -->
    <div class="form-group col-sm-12 col-lg-12">
        {!! Form::label('description', 'Описание:') !!}
        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="row">
    <!-- Submit Field -->
    <div class="form-group col-sm-12">
        {!! Form::submit('Сохранить', ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('filials.index') }}" class="btn btn-secondary">Отмена</a>
    </div>
</div>
