@extends('master')

@section('content')
    <h3 class="pb-3 mb-4 font-italic border-bottom">
        From the Blog
    </h3>

    @foreach ($articles as $article)
        <div class="blog-post">
            <h2 class="blog-post-title">{{ $article->title }}</h2>
            <p class="blog-post-meta">
                {{ $article->created_at->diffForHumans() }} by <a href="">{{ $article->user->username }}</a>
                on <a href="">{{ $article->category->name }}</a>
            </p>
        </div><!-- /.blog-post -->
    @endforeach
@stop
