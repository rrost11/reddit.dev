@extends('layouts.master')

@section('title')
	Create an User
@stop

@section('content')
	<form method="POST" action="{{action('UsersController@store')}}">
		<div class="form-group">
			{!! csrf_field() !!}
		</div>

	  <div class="form-group">
	    <label for="title">Name</label>
	    <input type="text" name="name" class="form-control"  placeholder="Full name" value="{{old('name')}}">
	  </div>
		@if($errors->has('name'))
			<div class="alert alert-danger">
				{{$errors->first('name')}}
			</div>
		@endif

	  <div class="form-group">
	    <label for="url">Email</label>
	    <input type="text" class="form-control" name="email" placeholder="Email" value="{{old('email')}}">
	  </div>
	  @if($errors->has('email'))
			<div class="alert alert-danger">
				{{$errors->first('email')}}
			</div>
		@endif

	  <div class="form-group">
	    <label >Password</label>
	    <input type="password" class="form-control" name="password" placeholder="Password" value="{{old('password')}}">
	  </div>
	  @if($errors->has('password'))
			<div class="alert alert-danger">
				{{$errors->first('password')}}
			</div>
		@endif

	  {{-- //validate new password with confirm password. --}}
	  
	  <button type="submit" class="btn btn-primary">Submit</button>
	</form>
@stop