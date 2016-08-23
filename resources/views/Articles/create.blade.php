@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Create new article</h1>


            {{Form::model($article = new \App\Article, ['url'=>'articles'])}}
                @include('articles._form',['submitButtonText' =>'Add Article'])
            {{Form::close()}}


        </div>
    </div>
@endsection
