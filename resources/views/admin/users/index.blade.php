@extends('layouts.admin')

@section('content')

    @if(Session::has('deleted_user'))
        <p class="bg-danger">{{session('deleted_user')}}</p>
    @endif
    @if(Session::has('created_user'))
        <p class="bg-success">{{session('created_user')}}</p>
    @endif
    @if(Session::has('edit_user'))
        <p class="bg-success">{{session('edit_user')}}</p>
    @endif

    <h1>Users</h1>

     <table class="table">
         <thead>
           <tr>
             <th>Id</th>
             <th>Photo</th>
             <th>Name</th>
             <th>Email</th>
             <th>Role</th>
             <th>Active</th>
             <th>Cretaed</th>
             <th>Updated</th>
           </tr>
         </thead>
         <tbody>
         @if($users)
             @foreach($users as $user)
               <tr>
                 <td>{{$user->id}}</td>
                 <td><img height="50" src="{{$user->photo ? $user->photo->file : 'http://placehold.it/50x50'}}" alt=""></td>
                 <td><a href="{{ route('admin.users.edit', $user->id) }}"> {{$user->name}} </a> </td>
                 <td>{{$user->email}}</td>
                 <td>{{$user->role ? $user->role->name : "no roles"}}</td>
                 <td>{{$user->is_active == 1 ? 'Active' : 'No active'}}</td>
                 <td>{{$user->created_at->diffForHumans()}}</td>
                 <td>{{$user->updated_at->diffForHumans()}}</td>
               </tr>
             @endforeach
           @endif
         </tbody>
     </table>

@stop