@extends('layouts.admin')

@section('content')

    @if(Session::has('delete_role'))
        <p class="bg-danger">{{session('delete_role')}}</p>
    @endif
    @if(Session::has('create_role'))
        <p class="bg-success">{{session('create_role')}}</p>
    @endif
    @if(Session::has('edit_role'))
        <p class="bg-success">{{session('edit_role')}}</p>
    @endif

    <h1>Roles</h1>

    <div class="col-md-4">
        {!! Form::open(['method'=>'POST', 'action'=>'AdminRolesController@store']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Create Role', ['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>

    <div class="col-md-8">
        <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Cretaed</th>
            </tr>
            </thead>
            <tbody>
            @if($roles)
                @foreach($roles as $role)
                    <tr>
                        <td>{{$role->id}}</td>
                        <td><a href="{{ route('admin.roles.edit', $role->id) }}"> {{$role->name}} </a> </td>
                        <td>{{$role->created_at ? $role->created_at->diffForHumans() : 'no date'}}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@stop