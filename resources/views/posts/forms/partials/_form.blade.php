@if (session()->has('flash_message'))
    <div class="form-group">
        <p>{{ session()->get('flash_message') }}</p>
    </div>
@endif


<div class="form-group">
  {!! Form::label('headline', 'Headline') !!} 
  {!! Form::text('headline', null, ['class' => 'form-control input-lg']) !!}
  {!! errors_for('headline', $errors) !!}  
</div>

<div class="form-group">
	<label>Category</label>
	<p class="help-block">Select all that apply</p>
	<div class="checkbox">
		<label>
		  {!! Form::checkbox('media_mention', 1) !!}
		  Media Mention
		</label>
	</div>

	<div class="checkbox">
		<label>
		  {!! Form::checkbox('presentation', 1) !!}
		  Presentation
		</label>
	</div>

	<div class="checkbox">
		<label>
		  {!! Form::checkbox('meeting', 1) !!}
		  Meeting
		</label>
	</div>

	<div class="checkbox">
		<label>
		  {!! Form::checkbox('sponsored_event', 1) !!}
		  Sponsored Event
		</label>
	</div>
  
	<div class="checkbox">
		<label>
		  {!! Form::checkbox('on_campus_collaboration', 1) !!}
		  On-Campus Collaboration
		</label>
	</div>

	<div class="checkbox">
		<label>
		  {!! Form::checkbox('off_campus_collaboration', 1) !!}
		  Off-Campus Collaboration
		</label>
	</div>   

	<div class="checkbox">
		<label>
		  {!! Form::checkbox('development', 1) !!}
		  Conference/Staff Development
		</label>
	</div>

	<div class="checkbox">
		<label>
		  {!! Form::checkbox('satifaction_survey', 1) !!}
		  Client Satisfaction Survey
		</label>
	</div>
  
	<div class="checkbox">
		<label>
		  {!! Form::checkbox('achievement', 1) !!}
		  Achievement
		</label>
	</div>

	<div class="checkbox">
		<label>
		  {!! Form::checkbox('testimonial', 1) !!}
		  Testimonial/Accolades
		</label>
	</div> 
  
	<div class="input-group">
		<span class="input-group-addon">
		  {!! Form::checkbox('other', 1) !!}
		</span>

		{!! Form::text('other_desc', null, ['class' => 'form-control', 'placeholder' => 'Other']) !!}
		{!! errors_for('other_desc', $errors) !!}  	
	</div> 
</div>

<div class="form-group">
  {!! Form::label('source_id', 'Source') !!}
  {!! Form::select('source_id', $source_options, Input::old('source_id'), ['class' => 'form-control select2', 'placeholder' => 'Please select a source']) !!}
</div><!-- /.form-group -->


<div class="form-group">
  {!! Form::label('publish_date', 'Publish Date') !!}
  <div class="input-group">
    <div class="input-group-addon">
      <i class="fa fa-calendar"></i>
    </div>
   
    {!! Form::text('publish_date', null, ['id' => 'reservation','class' => 'form-control', 'placeholder' => 'Other']) !!}
  </div><!-- /.input group -->
</div><!-- /.form group -->


<div class="form-group">
  {!! Form::label('writer_collaborator', 'Writer/Collaborator') !!}
  {!! Form::text('writer_collaborator', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('department_id', 'Department/College/Unit') !!}
  {!! Form::select('department_id', $department_options, Input::old('department_id'), ['class' => 'form-control select2', 'placeholder' => 'Please select a client']) !!}
</div><!-- /.form-group -->

<div class="form-group">
  {!! Form::label('project_id', 'Project') !!}
  {!! Form::select('project_id', $project_options, Input::old('project_id'), ['class' => 'form-control select2', 'placeholder' => 'Please select a client']) !!}
</div><!-- /.form-group -->

<div class="form-group">
  {!! Form::label('notes', 'Notes') !!}  
  {!! Form::textarea('notes', null, ['class' => 'form-control']) !!}
</div>

<div class="input-group">
  <span class="input-group-addon"><i class="fa fa-laptop"></i></span>
  {!! Form::text('url', null, ['class' => 'form-control', 'placeholder' => 'Website']) !!}
</div>

<br/>

<div class="form-group">
  <label for="exampleInputFile">Attach File</label>
  <p>{!! Form::file('attachment') !!}</p>
  <?php
  if (isset($post->attachement)) {
      if (($post->attachment != '')){
      	echo "<div class='alert alert-block'>Previously uploaded logo:<br/><img style='max-width:250px' src='/logos/".$post->attachment."'></div>";
      }
  }
  ?>
  
  <p class="help-block">(Allowed file formats: PDF, DOC, DOCX, JPG, PNG, GIF)</p>
</div>







