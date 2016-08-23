@extends('layouts.app')

@section('content')

	<div class="row">
		<table class="table table-striped" style="font-size: 18px;">
		    <thead>
		      <tr>
		        <th>Title of the Article</th>
		        <th>Action</th>
		      </tr>
		    </thead>
		@foreach($articles as $article)

			<tbody>
		      <tr>
		        <td>
		        	<a href="/articles/{{$article->id}}" >
		        		{{$article->title}}
		        	</a>
		        </td>
		        <td>
		        	{!! Form::open(['method' => 'GET', 'url' => ['articles/'.$article->id.'/edit']]) !!}
        				{!! Form::submit('Edit', ['class' => '']) !!}
					{!! Form::close() !!}

		        	{!! Form::open(['method' => 'DELETE', 'url' => ['articles/'.$article->id],'onsubmit' => 'return ConfirmDelete()' ]) !!}
		        		<script type="text/javascript">
						     function ConfirmDelete()
							  {
							  var x = confirm("Are you sure you want to delete?");
							  if (x)
							    return true;
							  else
							    return false;
							  }
						</script>

        				{!! Form::submit('Delete', ['class' => '']) !!}
					{!! Form::close() !!}
		        </td>
		      </tr>
		    </tbody>
		@endforeach
  		</table>

		{{--<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Update Your Profile</div>
				<div class="panel-body">
					<div class="form-group">
						{{Form::label('name','Name')}}
						{{Form::text('name',$user->name,['class'=>'form-control'])}}
					</div>

					<div class="form-group">
						{{Form::label('email','Email')}}
						{{Form::text('email',$user->email,['class'=>'form-control'])}}
					</div>

					<div class="form-group">
						{{Form::submit('Update',['class'=>'btn btn-primary form-control'])}}
					</div>

				</div>
			</div>
		</div>--}}
	</div>

@endsection
