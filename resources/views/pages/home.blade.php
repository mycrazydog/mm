@extends('auth')

@section('title', 'Login')
@section('bodyClass', 'lockscreen')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                
                <div class="  lockscreen-wrapper">
                	
                	<div class="login-logo">
                	 <a href="{{ url('manage/posts') }}"><img src="{{ asset ("/assets/uncc_crown.png") }}"></a>
                	
                	  <a href="{{ url('manage/posts') }}"><b>MEDIA</b>MENTIONS</a>
                	</div><!-- /.login-logo -->
                

                    <div class="panel-body">

                    </div>
                </div>



            </div>
        </div>
    </div>

@endsection