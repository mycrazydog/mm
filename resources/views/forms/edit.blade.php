@extends('default')

@section('content')

<!------------------------------------------------->

row
small sm = 24
medium md = 12
/row

<!------------------------------------------------->
<div class="row">
<div class="col-md-12">

<div class="box box-default">
	<div class="box-header with-border">
		<h3 class="box-title">Edit</h3>
		@include('errors.list')
	</div>	
	{!! Form::model($post, [
			'method' => 'PATCH',
	        'route' => ['admin.posts.update', $post->id],
	        'files'=> true,
	        'class'=>'myForm'
	    ]) !!}
		
	<div class="box-body">
		
	
		<!-- Partial -->		
		@include('forms/partials/_form')
	</div><!-- /.box-body -->
	<div class="box-footer">
	  <button type="submit" class="btn btn-primary">Submit</button>
	</div>
	{!! Form::close() !!}
</div>


<!------------------------------------------------->

</div>
</div>
@endsection