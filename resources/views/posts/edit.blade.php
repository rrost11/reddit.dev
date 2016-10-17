@extends('layouts.master')

@section('title')
	Create a Post
@stop

@section('content')
	
	<form method="POST" action="{{action('PostsController@update', $post->id)}}">
		<div class="form-group">
			{!! csrf_field() !!}
			{!! method_field('PUT')!!}
		</div>

	  <div class="form-group">
	    <label for="title">Title</label>
	    <input type="text" name="title" class="form-control"  placeholder="Title" value="{{old('title') == null ? $post->title : old('title')}}">
	  </div>
	  @if($errors->has('title'))
			<div class="alert alert-danger">
				{{$errors->first('title')}}
			</div>
		@endif

	  <div class="form-group">
	    <label for="url">URL</label>
	    <input type="text" class="form-control" name="url" placeholder="URL" value="{{old('url') == null ? $post->url : old('url')}}">
	  </div>
	  @if($errors->has('url'))
			<div class="alert alert-danger">
				{{$errors->first('url')}}
			</div>
		@endif

	  <div class="form-group">
	    <label for="exampleInputEmail1">Email address</label>
	    <textarea class="form-control" rows="10" name="content" placeholder="Description" >{{old('content') == null ? $post->content : old('content')}}</textarea>
	  </div>
	  @if($errors->has('content'))
			<div class="alert alert-danger">
				{{$errors->first('content')}}
			</div>
		@endif
	  
	  <button type="submit" class="btn btn-primary pull-left">Submit</button>
	</form>
	<form action="{{action('PostsController@destroy', $post->id)}}" method="POST" class="pull-left">
		{!! csrf_field() !!}
		{!! method_field('DELETE')!!}

		<button type="submit" class="btn btn-danger pull-right">Delete</button>
	</form>
@stop