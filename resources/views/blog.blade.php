@extends('layouts.blog-home')

@section('content')


    <div class="col-md-8">
        <h1 class="page-header">Page Heading<small>Secondary Text</small></h1>
        @if($posts)
            @foreach($posts as $post)
                <h2><a href="{{route('home.post', $post->slug)}}">{{$post->title}}</a></h2>
                <p class="lead">by <a href="#">{{$post->user->name}}</a></p>
                <p><span class="glyphicon glyphicon-time"></span> {{$post->created_at}}</p>
                <hr>
                <img class="img-responsive" src="{{$post->photo->file}}" alt="">
                <hr>
                <p>{{$post->body}}</p>
                <a class="btn btn-primary" href="{{route('home.post', $post->slug)}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                <hr>
            @endforeach
        @endif
        <div class="row">
            <div class="col-sm-6 col-sm-offset-5">
                {{$posts->render()}}
            </div>
        </div>
    </div>

@stop
