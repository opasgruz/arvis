@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
          <li class="breadcrumb-item">
             <a href="{!! route('workers.index') !!}">Сотрудники</a>
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
                              <strong>Редактирование сотрудника</strong>
                          </div>
                          <div class="card-body">
                              {!! Form::model($worker, ['route' => ['workers.update', $worker->id], 'method' => 'patch']) !!}

                              @include('workers.fields')

                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
         </div>
    </div>
@endsection