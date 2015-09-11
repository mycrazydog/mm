@if (session()->has('flash_message'))
    <div class="form-group">
        <p>{{ session()->get('flash_message') }}</p>
    </div>
@endif


<div class="form-group">
  {!! Form::label('headline', 'Headline') !!}  
  <a data-container="body" data-toggle="popover" data-placement="top" data-trigger="hover" 
  data-content="Please enter the headline of the article or the topic of your presentation or meeting.">
  <span class="badge bg-blue"><i class="fa fa-info"></i></span>
  </a> 
   
  {!! Form::text('headline', null, ['class' => 'form-control input-lg']) !!}
  {!! errors_for('headline', $errors) !!}  
</div>

<div class="form-group">
	<label>Category</label>	 
	 <a data-container="body" data-toggle="popover" data-placement="top" data-trigger="hover" 
	 data-content="Please select the category or categories for your entry. If none of the existing categories fit, click the box beside 'other' and type in your category.">
	 <span class="badge bg-blue"><i class="fa fa-info"></i></span>
	 </a>
	
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
  <a data-container="body" data-toggle="popover" data-placement="top" data-trigger="hover" 
  data-content="If your entry is an article in a newspaper or journal, select the name of the newspaper or journal from the existing entries. If your entry is a meeting or presentation, enter the name of the group (ie if a presentation to the Charlotte Mecklenburg Library, then enter Charlotte Mecklenburg Library under source.">
  <span class="badge bg-blue"><i class="fa fa-info"></i></span>
  </a>
  
  {!! Form::select('source_id', $source_options, Input::old('source_id'), ['class' => 'form-control select2', 'placeholder' => 'Please select a source']) !!}
</div><!-- /.form-group -->


<div class="form-group">
  {!! Form::label('publish_date', 'Publish Date') !!}  
  <a data-container="body" data-toggle="popover" data-placement="top" data-trigger="hover" 
  data-content="Enter the date of the media mention.">
  <span class="badge bg-blue"><i class="fa fa-info"></i></span>
  </a>
  
  <div class="input-group">
    <div class="input-group-addon">
      <i class="fa fa-calendar"></i>
    </div>
   
    {!! Form::text('publish_date', null, ['id' => 'reservation','class' => 'form-control', 'placeholder' => 'Other']) !!}
  </div><!-- /.input group -->
</div><!-- /.form group -->


<div class="form-group">
  {!! Form::label('writer_collaborator', 'Writer/Collaborator') !!} <a data-container="body" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Please enter the name of the article writer or the person our staff collaborated with."><span class="badge bg-blue"><i class="fa fa-info"></i></span></a>
  {!! Form::text('writer_collaborator', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	<script type="text/javascript">
	var selectedValues = [];
	@if(isset($staff_selected))
	   var selectedValues = {!! $staff_selected !!};    
	@endif
	</script>	

  {!! Form::label('staff_list', 'Institute Staff Involved') !!}  
  <a data-container="body" data-toggle="popover" data-placement="top" data-trigger="hover" 
  data-content="Enter the name of the staff member involved. Use the format last name first (ie Michael, Jeff). If more than one individual, enter the names separated by commas.">
  <span class="badge bg-blue"><i class="fa fa-info"></i></span>
  </a>    
  
  {!! Form::select('staff_list[]', $staff_options, null, ['class' => 'form-control multi', 'multiple' => 'multiple']) !!}
</div><!-- /.form-group -->

<div class="form-group">
  {!! Form::label('department_id', 'Organization/Department') !!}
  <a data-container="body" data-toggle="popover" data-placement="top" data-trigger="hover" 
  data-content="If the event is a collaboration, enter the name of the outside organization or department.">
  <span class="badge bg-blue"><i class="fa fa-info"></i></span>
  </a>  
  
  {!! Form::select('department_id', $department_options, Input::old('department_id'), ['class' => 'form-control select2', 'placeholder' => 'Please select a organization/department']) !!}
</div><!-- /.form-group -->

<div class="form-group">
  {!! Form::label('notes', 'Summary/Notes') !!}
  <a data-container="body" data-toggle="popover" data-placement="top" data-trigger="hover" 
  data-content="Enter a short summary of the media mention or collaboration. If the media mention is a newspaper or journal article, copy and paste the section that includes the name of the Institute staff.">
  <span class="badge bg-blue"><i class="fa fa-info"></i></span>
  </a> 
    
  {!! Form::textarea('notes', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	
	{!! Form::label('website', 'Website') !!}
	<a data-container="body" data-toggle="popover" data-placement="top" data-trigger="hover" 
	data-content="Copy paste the website for the media mention if available.">
	<span class="badge bg-blue"><i class="fa fa-info"></i></span>
	</a>	

  <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-laptop"></i></span>
  {!! Form::text('url', null, ['class' => 'form-control', 'placeholder' => 'Website']) !!}
  </div>
</div>

<br/>

<div class="form-group">
	<?php	
	if (isset($post->attachment)) {	
		if (($post->attachment != '')){
			echo "<div class='callout callout-info'><h4>Previously uploaded file:</h4><p><a class='btn btn-block btn-primary btn-lg' href='/resources/". $post->attachment."'><i class='fa fa-book'></i> ".$post->attachment."</a></p></div>";	
		}
	}			
	?>




  <label for="exampleInputFile">Attach File</label>
  <a data-container="body" data-toggle="popover" data-placement="top" data-trigger="hover" 
  data-content="Include copies of PDF newspaper or journal articles, PowerPoint presentations, or any other documents for the media mention.">
  <span class="badge bg-blue"><i class="fa fa-info"></i></span>
  </a> 	
  
  <p>{!! Form::file('attachment') !!}</p>
  <?php
  if (isset($post->attachement)) {
      if (($post->attachment != '')){
      	echo "<div class='alert alert-block'>Previously uploaded logo:<br/><img style='max-width:250px' src='/logos/".$post->attachment."'></div>";
      }
  }
  ?>
  
  <p class="help-block">(Allowed file formats: PDF, DOC, DOCX, JPG, PNG, GIF, PPT)</p>
</div>







