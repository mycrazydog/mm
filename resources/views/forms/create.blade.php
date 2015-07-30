@extends('default')

@section('content')

<!------------------------------------------------->

row
small sm = 24
medium md = 12
/row

<!------------------------------------------------->


<div class="box box-default">
	<div class="box-header with-border">
		<h3 class="box-title"><i class="fa fa-tag"></i> Color Palette</h3>
	</div>
	<div class="box-body">
	
	{!! Form::model($post, [
	        'route' => ['update/post', $post->id],
	        'files'=> true,
	        'class'=>'form-horizontal'
	    ]) !!}
	
		<!-- CSRF Token -->
		{!! Form::token() !!}
	
		@include('forms/partials/_form')
	
	{!! Form::close() !!}
	
	</div><!-- /.box-body -->
</div>


<!------------------------------------------------->


@endsection