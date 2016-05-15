@extends('layouts.admin')

@section('content')

    <h1>Edit Posts</h1>

    <div class="col-md-3">
        <img height="150" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/50x50'}}" alt="">
    </div>

    <div class="col-md-9">

    {!! Form::model($post, ['method'=>'PATCH', 'action'=>['AdminPostsController@update', $post->id], 'files'=>true]) !!}
            <div class="form-group">
                {!! Form::label('title', 'Title:') !!}
                {!! Form::text('title', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('category_id', 'Category:') !!}
                {!! Form::select('category_id', $categories, null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('photo_id', 'Image:') !!}
                {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('body', 'Body:') !!}
                {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>6]) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Update Post', ['class'=>'btn btn-primary col-md-2']) !!}
            </div>
    {!! Form::close() !!}

        {!! Form::open(['method'=>'DELETE', 'action'=> ['AdminPostsController@destroy', $post->id]]) !!}
                  <div class="form-group">
                      {!! Form::submit('Delete Post', ['class'=>'btn btn-danger col-md-2 pull-right']) !!}
                  </div>
        {!! Form::close() !!}

    </div>
    <div class="row">
         @include('include.error')
    </div>
@endsection