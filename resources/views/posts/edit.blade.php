@extends('layouts.master')

@section('title')
	Create a Post
@stop

@section('content')
<h3 class="white" style="text-align: center">Edit Post</h3>
<br>
<hr>
	
	<form method="POST" action="{{action('PostsController@update', $post->id)}}">
		<div class="form-group">
			{!! csrf_field() !!}
			{!! method_field('PUT')!!}
		</div>

	  <div class="form-group">
	    <label for="title"><h5 class="white">Title</h5></label>
	    <input type="text" name="title" class="form-control"  placeholder="Title" value="{{old('title') == null ? $post->title : old('title')}}">
	  </div>
	  @if($errors->has('title'))
			<div class="alert alert-danger">
				{{$errors->first('title')}}
			</div>
		@endif

	  <div class="form-group">
	    <label for="url"><h5 class="white">URL</h5></label>
	    <input type="text" class="form-control" name="url" placeholder="URL" value="{{old('url') == null ? $post->url : old('url')}}">
	  </div>
	  @if($errors->has('url'))
			<div class="alert alert-danger">
				{{$errors->first('url')}}
			</div>
		@endif

	  <div class="form-group">
	    <label for="exampleInputEmail1"><h5 class="white">Email address</h5></label>
	    <textarea class="form-control" rows="10" name="content" placeholder="Description" >{{old('content') == null ? $post->content : old('content')}}</textarea>
	  </div>
	  <br>
	  @if($errors->has('content'))
			<div class="alert alert-danger">
				{{$errors->first('content')}}
			</div>
		@endif
	  <div class="row">
	  <button type="submit" style="margin-left: 21px" class="btn btn-success pull-left">Submit</button>
	</form>
	<form action="{{action('PostsController@destroy', $post->id)}}" method="POST" class="pull-left">
		{!! csrf_field() !!}
		{!! method_field('DELETE')!!}

		<button type="submit" style="margin-left: 990px" class="btn btn-danger">Delete</button>
		</div>
	</form>
@stop