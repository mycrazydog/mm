@extends('auth')

@section('title', 'Login')
@section('bodyClass', 'login-page')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default login-box">
                	
                	<div class="login-logo">
                	  <a href="../../index2.html"><b>Admin</b>LTE</a>
                	</div><!-- /.login-logo -->
                
                    <div class="panel-heading">
                        <h3 class="panel-title">Login</h3>
                    </div>
                    <div class="panel-body">
                        {!! Form::open(['route' => 'sessions.store']) !!}
                        <fieldset>

                            @if (session()->has('flash_message'))
                                <div class="alert alert-success">
                                    {{ session()->get('flash_message') }}
                                </div>
                            @endif

                            @if (session()->has('error_message'))
                                <div class="alert alert-danger">
                                    {{ session()->get('error_message') }}
                                </div>
                            @endif

                            <!-- Email field -->
                            <div class="form-group has-feedback">
                                {!! Form::text('email', null, ['placeholder' => 'Email', 'class' => 'form-control', 'required' => 'required'])!!}
                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                {!! errors_for('email', $errors) !!}
                            </div>

                            <!-- Password field -->
                            <div class="form-group has-feedback">
                                {!! Form::password('password', ['placeholder' => 'Password','class' => 'form-control', 'required' => 'required'])!!}
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                {!! errors_for('password', $errors) !!}
                            </div>

                            <div class="checkbox">
                                <!-- Remember me field -->
                                <div class="form-group">
                                    <label>
                                        {!! Form::checkbox('remember', 'remember') !!} Remember me
                                    </label>
                                </div>
                            </div>

                            <!-- Submit field -->
                            <div class="form-group">
                                {!! Form::submit('Login', ['class' => 'btn btn btn-lg btn-success btn-block']) !!}
                            </div>
                        </fieldset>
                        {!! Form::close() !!}
                    </div>
                </div>
                <div style="text-align:center">
                    <p><a href="{{ url('forgot_password') }}">Forgot Password?</a></p>
                </div>


            </div>
        </div>
    </div>

@endsection