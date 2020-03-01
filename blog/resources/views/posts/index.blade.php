@extends('layouts.app')

@section('content')
  <h1>Posts</h1>
  @if(count($posts) > 0)
    @foreach($posts as $post)
    <div class="card mb-3 mx-auto" style="width: 18rem;">
      <img class="card-img-top" src="/storage/cover_images/{{ $post->cover_image }}" alt="image">
      <div class="card-body bg-light">
          <h3><a href="/posts/{{$post->id}}">{{ $post->title }}</a></h3>
          <small>Written on {{ $post->created_at }} <br> by {{ $post->user->name }} </small>
      </div>
    </div>  
    @endforeach
    {{$posts->links()}}
  @else
    <p>No posts found</p>
  @endif  
@endsection