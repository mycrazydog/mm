@extends('default')

@section('title', 'Sources')

@section('content')

Page {!! $sources->currentPage() !!} of {!! $sources->lastPage() !!}

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th class="span1"></th>
            <th class="span6">Name</th>
            <th class="span2"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($sources as $source)        
        <tr>
            <td><a href="{{ route('manage.sources.edit', $source->id) }}"><span class="glyphicon glyphicon-pencil"></span></a></td>
            <td><a href="{{ route('manage.sources.edit', $source->id) }}">{!! $source->name !!}</a></td>
            <td><a href="{{ route('manage.sources.destroy', $source->id) }}" data-toggle="modal" data-target="#delete_confirm"><span class="glyphicon glyphicon-trash"></span></a></td>
        </tr>

        @endforeach
    </tbody>
</table>

{!! $sources->render() !!}





@endsection