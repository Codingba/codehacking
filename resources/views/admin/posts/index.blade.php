@extends('layouts.admin')

@section('content')

    @if(Session::has('delete_post'))
        <p class="bg-danger">{{session('delete_post')}}</p>
    @endif
    @if(Session::has('create_post'))
        <p class="bg-success">{{session('create_post')}}</p>
    @endif
    @if(Session::has('edit_post'))
        <p class="bg-success">{{session('edit_post')}}</p>
    @endif

    <h1>Posts</h1>

     <table class="table">
         <thead>
           <tr>
               <th>Id</th>
               <th>Photo</th>
               <th>Owner</th>
               <th>Category</th>
               <th>Title</th>
               <th>Body</th>
               <th>Created</th>
               <th>Updated</th>
           </tr>
         </thead>
         <tbody>
         @if($posts)
             @foreach($posts as $post)
               <tr>
                 <td>{{$post->id}}</td>
                   <td><img height="50" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/50x50'}}" alt=""></td>
                   <td><a href="{{route('admin.posts.edit', $post->id)}}"> {{$post->user ? $post->user->name : 'username'}} </a></td>
                   <td>{{$post->category ? $post->category->name : 'noname'}}</td>
                 <td>{{$post->title}}</td>
                 <td>{{str_limit($post->body, 20)}}</td>
                 <td>{{$post->created_at->diffForHumans()}}</td>
                 <td>{{$post->updated_at->diffForHumans()}}</td>
               </tr>
             @endforeach
         @endif
         </tbody>
       </table>

@endsection