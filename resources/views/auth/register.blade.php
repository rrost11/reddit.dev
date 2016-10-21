@extends('layouts.master')

@section('content')
<h1 class="white text-center">Register</h1>
<br>

	@if(count($errors))
		<div class="alert alert-danger">
		@foreach($errors->all() as $error)
			<p>{{ $error }}</p>
		@endforeach
		</div>
	@endif
	<div class="row">
		<div class="col-sm-6 col-sm-offset-3">
			<form method="POST" action="{{ action('Auth\AuthController@postRegister') }}">
				{{ csrf_field() }}
				<div class="form-group">
			    	<label for="name"><h5 class="white">Name: </h5></label>
			    	<input type="text" class="form-control" name="name" value="{{ old('name') }}">
			  	</div>
				<div class="form-group">
			    	<label for="email"><h5 class="white">Email: </h5></label>
			    	<input type="text" class="form-control" name="email" value="{{ old('email') }}">
			  	</div>
				<div class="form-group">
			    	<label for="password"><h5 class="white">Password: </h5></label>
			    	<input type="password" class="form-control" name="password">
			  	</div>
				<div class="form-group">
			    	<label for="password_confirmation"><h5 class="white">Password Confirmation: </h5></label>
			    	<input type="password" class="form-control" name="password_confirmation">
			  	</div>

<br>			  	<button type="submit" class="btn btn-success">Register</button>
			</form>
		</div>
		
	</div>
@stop