@extends('default')

@section('title', 'Edit Profile')

@section('content')
    <h1>Edit Profile</h1>

    @if (session()->has('flash_message'))
        <div class="alert alert-success">{{ session()->get('flash_message') }}</div>
    @endif

   
    {!! Form::open(['route' => 'admin.profiles.store']) !!}

        <div class="form-group">
            {!! Form::label('account_type', 'Account Type:') !!}
            {!! Form::select('account_type', $roles, null, ['class' => 'form-control']) !!}
            {!! errors_for('account_type', $errors) !!}
        </div>

        <!-- email Field -->
        <div class="form-group">
            {!! Form::label('email', 'Email:') !!}
            {!! Form::email('email', null, ['class' => 'form-control']) !!}
            {!! errors_for('email', $errors) !!}
        </div>


        <!-- first_name Field -->
        <div class="form-group">
            {!! Form::label('first_name', 'First Name:') !!}
            {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
            {!! errors_for('first_name', $errors) !!}
        </div>

        <!-- last_name Field -->
        <div class="form-group">
            {!! Form::label('last_name', 'Last Name:') !!}
            {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
            {!! errors_for('last_name', $errors) !!}

        </div>

        <!-- Password field -->
        <div class="form-group">
            {!! Form::label('password', 'Password:') !!}
            {!! Form::password('password', ['class' => 'form-control']) !!}
            {!! errors_for('password', $errors) !!}
        </div>

        <!-- Password Confirmation field -->
        <div class="form-group">
            {!! Form::label('password_confirmation', 'Repeat Password:') !!}
            {!! Form::password('password_confirmation', ['class' => 'form-control'] )!!}
        </div>


        <!-- Update Profile Field -->
        <div class="form-group">
            {!! Form::submit('Create Profile', ['class' => 'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}

@endsection