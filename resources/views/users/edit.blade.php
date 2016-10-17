@extends('layouts.master')

@section('content')
<div class="container view">
	<section>
		<h1 class="section-title">Edit User</h1>
		<form method="POST" action="{{ action('UsersController@update', $user->id) }}">
		{!! csrf_field() !!}
		{{ method_field('PUT') }}
			<div class="form-group">
				<label for="name">Name</label>
				<input 
					type="text" 
					class="form-control"
					name="name" 
					value="{{ old('name')?: $user->name }}">	
			</div>
			@include('partials.error', ['field' => 'name'])
			<div class="form-group">
				<label for="email">Email</label>
				<input 
					type="text" 
					class="form-control"
					name="email" 
					value="{{ old('email')?: $user->email }}">	
			</div>
			@include('partials.error', ['field' => 'email'])
<!-- 			<div class="form-group">
				<label for="password">Password</label>
				<input 
					type="password" 
					class="form-control"
					name="password" 
					value="{{ old('password') }}">				
			</div>
			@include('partials.error', ['field' => 'password'])
			<div class="form-group">
				<label for="password_confirmation">Password Confirm</label>
				<input
					type="password"
					class="form-control"
					name="password_confirmation"
					id="password_confirmation"
					value="{{ old('password_confirmation') }}">
			</div>
			@include('partials.error', ['field' => 'password_confirmation']) -->
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
		<br>
		<a href="{{ action('PostsController@index')}}">Go Back to Main Page</a>
	</section>
</div>
@stop