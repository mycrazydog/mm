@extends('default')

@section('title', 'Departments')

@section('content')

Page {!! $departments->currentPage() !!} of {!! $departments->lastPage() !!}

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th class="span1"></th>
            <th class="span6">Name</th>
            <th class="span2"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($departments as $department)        
        <tr>
            <td><a href="{{ route('manage.departments.edit', $department->id) }}"><span class="glyphicon glyphicon-pencil"></span></a></td>
            <td><a href="{{ route('manage.departments.edit', $department->id) }}">{!! $department->name !!}</a></td>
            <td>
            
            

            
            
            
            
            
            
            
            <!-- Delete -->
            <li data-form="#frmDelete-{!! $department->id !!}" data-title="Delete Ledger" data-message="Are you sure you want to delete this ledger ?" >
                <a class = "formConfirm" href="">Delete Ledger</a>
            </li>
			{!! Form::open(array(
			        'route' => array('manage.departments.destroy', $department->id),
			        'method' => 'delete',
			        'style' => 'display:inline'
			   ))
			!!}
            {!! Form::submit('Submit') !!}
            {!! Form::close() !!}
            
            
            
            
            </td>
            
        </tr>

        @endforeach
    </tbody>
</table>

{!! $departments->render() !!}


<div class="modal modal-danger fade" id="formConfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="frm_title">Delete</h4>
      </div>
      <div class="modal-body" id="frm_body"></div>
      <div class="modal-footer">
        <button style='margin-left:10px;' type="button" class="btn btn-primary col-sm-2 pull-right" id="frm_submit">Yes</button>
        <button type="button" class="btn btn-danger col-sm-2 pull-right" data-dismiss="modal" id="frm_cancel">No</button>
      </div>
    </div>
  </div>
</div>


@endsection