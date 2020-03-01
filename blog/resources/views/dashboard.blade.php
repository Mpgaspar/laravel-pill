@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <a href="/posts/create" class="btn btn-primary">Create Post</a>
                    <h3>Your Blog Posts</h3>
                    @if(count($posts) > 0)
                    <table class="table table-striped">   
                        @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->title }}</td>
                            <td><a href="/posts/{{ $post->id }}/edit" class="btn btn-secondary">Edit</a></td>
                            <td>
                              {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-rigth'])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Delete', ['class' => 'btn btn-danger offset-md-3'])}}
                              {!!Form::close()!!}
                            </td>
                        </tr>   
                        @endforeach
                    </table>
                    @else
                    <p>You have no Posts!</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
