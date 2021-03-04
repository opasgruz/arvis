@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
          <li class="breadcrumb-item">
             <a href="{!! route('positions.index') !!}">Должности</a>
          </li>
          <li class="breadcrumb-item active">Редактирование</li>
        </ol>
    <div class="container-fluid">
         <div class="animated fadeIn">
             @include('coreui-templates::common.errors')
             <div class="row">
                 <div class="col-lg-12">
                      <div class="card">
                          <div class="card-header">
                              <i class="fa fa-edit fa-lg"></i>
                              <strong>Редактирование должности</strong>
                          </div>
                          <div class="card-body">
                              {!! Form::model($position, ['route' => ['positions.update', $position->id], 'method' => 'patch']) !!}

                              @include('positions.fields')

                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
         </div>
    </div>
@endsection