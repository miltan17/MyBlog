@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Edit {{ $article->title }}</h1>


            {{Form::model($article,['method'=>'patch','url'=>'articles/'.$article->id])}}
                @include('articles._form',['submitButtonText' =>'Update Article'])
            {{Form::close()}}
        </div>
    </div>
@endsection
