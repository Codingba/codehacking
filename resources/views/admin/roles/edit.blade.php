@extends('layouts.admin')

@section('content')

    <h1>Edit Role</h1>

    <div class="col-md-4">
        {!! Form::model($role, ['method'=>'PATCH', 'action'=>['AdminRolesController@update', $role->id]]) !!}
        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Update Role', ['class'=>'btn btn-primary col-md-4']) !!}
        </div>
        {!! Form::close() !!}

        {!! Form::open(['method'=>'DELETE', 'action'=> ['AdminRolesController@destroy', $role->id]]) !!}
        <div class="form-group">
            {!! Form::submit('Delete role', ['class'=>'btn btn-danger col-md-4 pull-right']) !!}
        </div>
        {!! Form::close() !!}

    </div>

@stop