@extends('layouts.app')

@section('content')
  <h1>{{ $title }}</h1>
  {!! Form::open(['action' => 'PagesController@postContact', 'method' => 'POST']) !!}
  {{ csrf_field() }}
      <div class="form-group">
          {{Form::label('email', 'Email')}}
          {{Form::email('email', '', ['class' => 'form-control', 'placeholder' => 'Your best email'])}}
      </div>
      <div class="form-group">
          {{Form::label('subject', 'Subject')}}
          {{Form::text('subject', '', ['class' => 'form-control', 'placeholder' => 'Subject'])}}
      </div>
      <div class="form-group">
          {{Form::label('message', 'Message')}}
          {{Form::textarea('message', '', ['class' => 'form-control', 'placeholder' => 'Write your message here'])}}
      </div>
      {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
  {!! Form::close() !!}
@endsection