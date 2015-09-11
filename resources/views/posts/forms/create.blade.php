@extends('default')

@section('title', 'Create')


@section('content')

<!------------------------------------------------->
<div class="row">
<div class="col-md-12">

<div class="box box-default">
	<div class="box-header with-border">
		<h3 class="box-title">new media mention</h3>
		@include('errors.list')
	</div>
	{!! Form::open(['method' => 'POST', 'route' => 'manage.posts.store']) !!}	
	<div class="box-body">
		
	
		<!-- Partial -->		
		@include('posts/forms/partials/_form')
	</div><!-- /.box-body -->
	<div class="box-footer">
	  
		<p>Please review your entry and if you are satisfied hit submit to enter your media mention.​ Thank you for your help!</p>	
		
		<button type="submit" class="btn btn-primary">Submit</button>
		
	</div>
	{!! Form::close() !!}
</div>


<!------------------------------------------------->

</div>
</div>
@endsection