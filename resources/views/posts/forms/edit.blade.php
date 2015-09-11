@extends('default')

@section('title', 'Edit')

@section('content')

<!------------------------------------------------->
<div class="row">
<div class="col-md-12">

<div class="box box-default">
	<div class="box-header with-border">
		<h3 class="box-title">existing media mention</h3>
		@include('errors.list')
	</div>	
	{!! Form::model($post, [
			'method' => 'PATCH',
	        'route' => ['manage.posts.update', $post->id],
	        'files'=> true,
	        'class'=>'myForm'
	    ]) !!}
		
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