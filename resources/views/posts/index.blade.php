@extends('default')

@section('title', 'List')

@section('content')

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th class="span1"></th>
            <th class="span6">Headline</th>
            <th class="span2">Date</th>
            <th class="span2">User</th>
            <th class="span2"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)        
        <tr>
            <td><a href="{{ route('manage.posts.edit', $post->id) }}"><span class="glyphicon glyphicon-pencil"></span></a></td>
            <td><a href="{{ route('manage.posts.edit', $post->id) }}">{!! $post->headline !!}</a></td>
            <td>{{{ $post->created_at->diffForHumans() }}}</td>
            <td>{!! $post->author->first_name !!} {!! $post->author->last_name !!}</td>
            <td><a href="{{ route('manage.posts.destroy', $post->id) }}" data-toggle="modal" data-target="#delete_confirm"><span class="glyphicon glyphicon-trash"></span></a></td>
        </tr>

        @endforeach
    </tbody>
</table>

@endsection