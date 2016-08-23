@extends('layouts.app')

@section('content')
    <div class="post-preview">
    <h2 class="post-title">
            {{ $article->title }}
    </h2>

    <h3 class="post-subtitle">
        {{$article->body}}
    </h3>
    @unless($article->tags->isEmpty())
        <h5>Tags</h5>
        <ul>
            @foreach($article->tags as $tag)
                <li>{{$tag->name}}</li>
            @endforeach
        </ul>
    @endunless
    </div>
@endsection
