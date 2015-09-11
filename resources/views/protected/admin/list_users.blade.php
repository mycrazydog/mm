@extends('default')

@section('title', 'List Users')

@section('content')

<div class="pull-right">
    <a href="{{ route('admin.profiles.create') }}" class="btn btn-small btn-success"><span class="glyphicon glyphicon-plus"></span> Create User</a>
</div>
    
    
    
    
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
              <th>id</th>
              <th>Email</th>
              <th>First Name</th>
              <th>Last Name</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td><a href="profiles/{{ $user->id }}">{{ $user->email }}</a> 
                @if ($user->inRole($admin))
                <span class="label label-warning">{{ 'Admin' }}</span>
                @endif
                </td>
                <td>{{ $user->first_name}}</td>
                <td>{{ $user->last_name}}</td>
             </tr>
            @endforeach

        </tbody>
    </table>

@stop