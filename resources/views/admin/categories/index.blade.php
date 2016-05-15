@extends('layouts.admin')

@section('content')

    @if(Session::has('delete_cat'))
        <p class="bg-danger">{{session('delete_cat')}}</p>
    @endif
    @if(Session::has('create_cat'))
        <p class="bg-success">{{session('create_cat')}}</p>
    @endif
    @if(Session::has('edit_cat'))
        <p class="bg-success">{{session('edit_cat')}}</p>
    @endif

    <h1>Categories</h1>

    <div class="col-md-4">
        <h1>Add Category</h1>
         {!! Form::open(['method'=>'POST', 'action'=>'AdminCategoriesController@store']) !!}
                     <div class="form-group">
                          {!! Form::label('name', 'Name:') !!}
                          {!! Form::text('name', null, ['class'=>'form-control']) !!}
                      </div>
                      <div class="form-group">
                           {!! Form::label('order', 'Order:') !!}
                           {!! Form::text('order', null, ['class'=>'form-control']) !!}
                       </div>
                      <div class="form-group">
                          {!! Form::submit('Create Category', ['class'=>'btn btn-primary']) !!}
                      </div>
         {!! Form::close() !!}

        <hr>

        <h1>Edit Category</h1>
        {!! Form::open(['method'=>'POST', 'action'=>'AdminCategoriesController@store']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('order', 'Order:') !!}
            {!! Form::text('order', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Create Category', ['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>

    <div class="col-md-8">
        <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Order</th>
                <th>Cretaed</th>
            </tr>
            </thead>
            <tbody>
            @if($categories)
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td><a href="{{ route('admin.categories.edit', $category->id) }}"> {{$category->name}} </a> </td>
                        <td>{{$category->order}}</td>
                        <td>{{$category->created_at ? $category->created_at->diffForHumans() : 'no date'}}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@stop