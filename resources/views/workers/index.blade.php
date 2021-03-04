@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Сотрудники</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                 <div class="col-lg-12">
                     <div class="card">
                         <div class="card-header">
                             <a class="pull-left" title="Добавить должность" href="{{ route('workers.create') }}"><i class="fa fa-plus-square fa-2x"></i></a>
                             <h2 style="padding-left: 40px; font-size: 1.5rem;">Перечень сотрудников</h2>
                           </div>
                         <div class="card-body">
                             @include('workers.table')
                              <div class="pull-right mr-3">
                                     
                              </div>
                         </div>
                     </div>
                  </div>
             </div>
         </div>
    </div>
@endsection

