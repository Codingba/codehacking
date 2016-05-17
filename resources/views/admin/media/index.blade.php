@extends('layouts.admin')

@section('content')

    @if(Session::has('delete_photo'))
        <p class="bg-danger">{{session('delete_photo')}}</p>
    @endif
    @if(Session::has('create_photo'))
        <p class="bg-success">{{session('create_photo')}}</p>
    @endif

    <h1>Photos</h1>

    <div class="col-md-12">
        <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Cretaed</th>
            </tr>
            </thead>
            <tbody>
            @if($photos)
                @foreach($photos as $photo)
                    <tr>
                        <td>{{$photo->id}}</td>
                        <td><a href="{{ route('admin.media.edit', $photo->id) }}"> <img height="50" src="{{$photo->file}} " alt=""></a> </td>
                        <td>{{$photo->created_at ? $photo->created_at->diffForHumans() : 'no date'}}</td>
                        <td>
                            {!! Form::open(['method'=>'DELETE', 'action'=> ['AdminMediasController@destroy', $photo->id]]) !!}
                                      <div class="form-group">
                                          {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                                      </div>
                            {!! Form::close() !!}

                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@stop