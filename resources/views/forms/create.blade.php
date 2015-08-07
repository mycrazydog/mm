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
		<h3 class="box-title">Create</h3>
		@include('errors.list')
	</div>
	{!! Form::open(['method' => 'POST', 'route' => 'admin.posts.store']) !!}	
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