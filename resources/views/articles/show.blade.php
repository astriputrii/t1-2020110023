@extends('layouts.template')

@section('title', $article->title)

@section('content')
    <article class="blog-post my-4">
        <h1 class="display-5 fw-bold">{{ $article->isbn }}</h1>
        <p class="blog-post-meta">{{ $article->updated_at }}</p>
        @if ($article->image)
            <img src="{{ $article->image }}" class="rounded mx-auto d-block my-3">
        @endif
        <p>{{ $article->judul }}</p>
    </article>
@endsection
