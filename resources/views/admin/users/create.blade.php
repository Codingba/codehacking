@extends('layouts.admin')

@section('content')

    <h1>Create User</h1>

     {!! Form::open(['method'=>'POST', 'action'=>'AdminUsersController@store', 'files'=>true]) !!}
            <div class="form-group">
                 {!! Form::label('name', 'Name:') !!}
                 {!! Form::text('name', null, ['class'=>'form-control']) !!}
             </div>
             <div class="form-group">
                  {!! Form::label('email', 'Email:') !!}
                  {!! Form::text('email', null, ['class'=>'form-control']) !!}
              </div>
             <div class="form-group">
                  {!! Form::label('role_id', 'Role:') !!}
                  {!! Form::select('role_id', [''=>'Choose Option'] + $roles, null, ['class'=>'form-control']) !!}
              </div>
             <div class="form-group">
                  {!! Form::label('is_active', 'Status:') !!}
                  {!! Form::select('is_active', array(1 => 'Active', 0=>'Not active'), 0, ['class'=>'form-control']) !!}
              </div>
            <div class="form-group">
                 {!! Form::label('password', 'Password:') !!}
                 {!! Form::password('password', ['class'=>'form-control']) !!}
             </div>
             <div class="form-group">
                 {!! Form::label('photo_id', 'Image:') !!}
                 {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
             </div>
             <div class="form-group">
                 {!! Form::submit('Create User', ['class'=>'btn btn-primary']) !!}
             </div>
     {!! Form::close() !!}

    @include('include.error')

@stop