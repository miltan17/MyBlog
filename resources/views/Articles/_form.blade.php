
<!-- @if (Session::has('message'))
   <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif -->


<div class="form-group">
    {{Form::label('title','Title')}}
    {{Form::text('title',null,['class'=>'form-control'])}}
</div>
@if($errors->first('title') != null)
    <ul class="alert alert-danger">
        {{$errors->first('title')}}
    </ul>
@endif


<div class="form-group">
    {{Form::label('body','Body')}}
    {{Form::textarea('body',null,['class'=>'form-control'])}}
</div>
@if($errors->first('body') != null)
    <ul class="alert alert-danger">
        {{$errors->first('body')}}
    </ul>
@endif

<div class="form-group">
    {{Form::label('published_at','Publish On')}}
    {{Form::input('date','published_at', $article->published_at,['class'=>'form-control'] )}}
</div>
@if($errors->first('published_at') != null)
    <ul class="alert alert-danger">
        {{$errors->first('published_at')}}
    </ul>
@endif

<div class="form-group">
    {{Form::label('tag_list','Tags')}}
    {{Form::select('tag_list[]',$tags, null, ['id'=>'tag_list', 'class'=>'form-control','multiple'] )}}
</div>


<div class="form-group">
    {{Form::submit($submitButtonText,['class'=>'btn btn-primary form-control'])}}
</div>

@section('footer')
    <script>
        $('#tag_list').select2({
            placeholder:'Choose any tag',
            tags :true
        });
    </script>
@endsection