@extends('layouts.app')

@section('content')
    {!! Form::open(['method' => 'POST', 'action' => 'PostsController@store']) !!}
        <div class="form-group">
            {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title']) !!}
            {!! Form::text('content', null, ['class' => 'form-control', 'placeholder' => 'Content']) !!}
            {!! Form::submit('Create Post', ['class' => 'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </div>
    @endif
@endsection