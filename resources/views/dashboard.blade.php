@extends('master')

@section('content')
    <div class="well">
        <h4>Logged in successfully as {{ optional($user)->email }}</h4>
        <p>
            <img src="{{ url('uploads/images', optional($user)->photo) }}" class="img-thumbnail" width="250">
        </p>
        <p>
            <a href="{{ route('categories.index') }}" class="btn btn-info btn-block btn-lg">Category</a>
        </p>
        <p>
            <a href="{{ route('posts.index') }}" class="btn btn-info btn-block btn-lg">Post</a>
        </p>
    </div>
@stop
