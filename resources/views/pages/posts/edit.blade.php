@extends('layouts.app')

@section('content')
    {!! Form::model($post, ['method' => 'PATCH', 'action' => ['PostsController@update', $post->id]]) !!}
    {{ csrf_field() }}
        <div class="form-group">
            {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title']) !!}
            {!! Form::submit('Update Post', ['class' => 'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}
@endsection