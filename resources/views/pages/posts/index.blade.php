@extends('layouts.app')
@section('content')
    <ul>
        @foreach ($posts as $post)
            <li>
                <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>

                {!! Form::open(['method' => 'DELETE', 'action' => ['PostsController@destroy', $post->id]]) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            </li>
            <img height="30" width="30" src="{{ asset('/storage/' . $post->image_path) }}" alt="">
        @endforeach
    </ul>
@endsection