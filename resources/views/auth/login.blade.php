@extends('layouts.master')

@section('content')
<h3 class="white" style="text-align: center">Login</h3>
<br>
<hr>
@if(count($errors))
		<div class="alert alert-danger">
		@foreach($errors->all() as $error)
			<p>{{ $error }}</p>
		@endforeach
		</div>
	@endif
	<div class="row">
		<div class="col-sm-6 col-sm-offset-3">
			<form method="POST" action="{{ action('Auth\AuthController@postLogin') }}">
				{{ csrf_field() }}
				<div class="form-group">
			    	<label for="email"><h5 class="white">Email: </h5></label>
			    	<input type="text" class="form-control" name="email" value="{{ old('email') }}">
			  	</div>
			  
				<div class="form-group">
			    	<label for="password"><h5 class="white">Password: </h5></label>
			    	<input type="password" class="form-control" name="password">
			  	</div>
			  	<br>
			  	
			  	<button type="submit" class="btn btn-success">Login</button>
			  	<button type="button" href="" class="btn btn-danger pull-right" action="{{ action('Auth\PasswordController@postRegister') }}>Forgot Password</button>
		
			</form>
		</div>
		
	</div>
@stop