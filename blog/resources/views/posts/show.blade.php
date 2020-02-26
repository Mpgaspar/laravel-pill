@extends('layouts.app')

@section('content')
  <a href="/posts" class="btn btn-primary">Go Back</a>
  <h1>{{$post->title}}</h1>
  <div>
      {{$post->body}}
  </div>
  <hr>
  <small>Written on {{ $post->created_at }}</small>
  <hr>
  <div class="row">
  <a href="/posts/{{$post->id}}/edit" class="btn btn-secondary">Edit</a>

  {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-rigth'])!!}
      {{Form::hidden('_method', 'DELETE')}}
      {{Form::submit('Delete', ['class' => 'btn btn-danger offset-md-3'])}}
  {!!Form::close()!!}
  </div>
@endsection