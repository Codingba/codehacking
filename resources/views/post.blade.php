@extends('layouts.blog-post')

@section('content')

<h1>{{ $post->title }}</h1>
<p class="lead">by <a href="#">{{ $post->user->name }}</a></p>
<hr>
<p><span class="glyphicon glyphicon-time"></span> Posted {{ $post->created_at->diffForHumans() }}</p>
<hr>
<img class="img-responsive" src="{{ $post->photo->file }}" alt="">
<hr>
<!-- Post Content -->
<p>{{ $post->body }}</p>
<hr>
@if(Session::has('comment_message'))
    <p class="bg-success">{{session('comment_message')}}</p>
@endif

@if(Auth::check())
<!-- Comments Form -->
<div class="well">
    <h4>Leave a Comment:</h4>
     {!! Form::open(['method'=>'POST', 'action'=>'PostCommentsController@store']) !!}
          <input type="hidden" name="post_id" value="{{$post->id}}">
                 <div class="form-group">
                      {!! Form::label('body', 'Body:') !!}
                      {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>3]) !!}
                  </div>
                  <div class="form-group">
                      {!! Form::submit('Submit comment', ['class'=>'btn btn-primary']) !!}
                  </div>
     {!! Form::close() !!}
</div>
@endif

@if(count($comments) > 0)
        @foreach($comments as $comment)
            <!-- Comment -->
            <div class="media">
                <a class="pull-left" href="#">
                    <img height="64" class="media-object" src="{{$comment->photo}}" alt="">
                    {{--<img height="64" class="media-object" src="{{Auth::user()->gravatar}}" alt="">--}}
                </a>
                <div class="media-body">
                    <h4 class="media-heading">{{$comment->author}}
                        <small>{{$comment->created_at}}</small>
                    </h4>
                    {{$comment->body}}
                <div class="clearfix"></div>
        @if(count($comment->replies) > 0)
                 @foreach($comment->replies as $reply)
                      @if($reply->is_active == 1)
                           <!-- Nested Comment -->
                            <div class="media nested-comment">
                                <a class="pull-left" href="#">
                                    <img height="64" class="media-object" src="{{$reply->photo}}" alt="">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">{{$reply->author}}
                                        <small>{{$reply->created_at->diffForHumans()}}</small>
                                    </h4>
                                    <p>{{$reply->body}}</p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                      @endif
                @endforeach
         @endif
                </div>
            </div>
         @if(Auth::check())
                <div class="comment-reply-container">
                    <button class="toggle-reply btn btn-primary pull-right">Reply</button>
                    <div class="comment-reply col-md-12">
                        {!! Form::open(['method'=>'POST', 'action'=>'CommentRepliesController@createReply']) !!}
                        <input type="hidden" name="comment_id" value="{{$comment->id}}">
                        <div class="form-group">
                            {!! Form::label('body', 'Reply:') !!}
                            {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>1]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Submit Reply', ['class'=>'btn btn-primary']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
        @endif
      @endforeach
@endif

@stop

@section('scripts')

    <script>
        $(".comment-reply-container .toggle-reply").click(function(){
            $(this).next().slideToggle("slow");
        })
    </script>



@stop