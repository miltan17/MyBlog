@extends('layouts.app')

@section('content')
<div class="col-lg-7 col-lg-offset-1 col-md-7 col-md-offset-1">
    <div class="post-preview">
        @foreach($articles as $article)
        <h2 class="post-title">
            <a href="/articles/{{$article->id}}">
                {{ $article->title }}
            </a>
        </h2>


        <h3 class="post-subtitle">
            {{$article->body}}
        </h3>
        <p class="post-meta">Posted by {{$article->user->name}} on {{$article->created_at}}</p>
        @endforeach
    </div>
    <!-- Pager -->
    <ul class="pager">
        <li class="next">
            <a href="#">Older Posts &rarr;</a>
        </li>
    </ul>
</div>
<div class="col-lg-3 col-lg-offset-1 col-md-3 col-md-offset-1">
    <div class="list-group">
        <a href="#" class="list-group-item active">
           <h3>Tags</h3> 
        </a>
        @foreach($alltags as $tag)
            <a href="/tags/{{$tag->name}}" class="list-group-item">
                <span class="glyphicon"></span> {{$tag->name}} <span class="badge">{{$tag->articles->count()}} </span>
            </a>
        @endforeach
    </div>
</div>
</div>
@endsection
