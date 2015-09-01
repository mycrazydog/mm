@extends('default')

@section('title', 'Edit')

@section('content')

<!------------------------------------------------->
<div class="row">
<div class="col-md-12">

<div class="box box-default">
	<div class="box-header with-border">
		<h3 class="box-title">existing {!! $page_id !!}</h3>
		@include('errors.list')
	</div>	
	{!! Form::model($result, [
			'method' => 'PATCH',
	        'route' => ['manage.'. $page_id . 's.update', $result->id],
	        'files'=> true,
	        'class'=>'myForm'
	    ]) !!}
		
	<div class="box-body">
		
	
		<!-- Partial -->		
		@include('manage/forms/partials/_form')
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