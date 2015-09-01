@if (session()->has('flash_message'))
    <div class="form-group">
        <p>{{ session()->get('flash_message') }}</p>
    </div>
@endif


<div class="form-group">
  {!! Form::label('name', 'Name') !!} 
  {!! Form::text('name', null, ['class' => 'form-control input-lg']) !!}
  {!! errors_for('name', $errors) !!}  
</div>







