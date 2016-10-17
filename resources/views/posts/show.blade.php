@extends('layouts.master')

@section('title')
Post {{$post->id}}	
@stop

@section('content')

	<div class="col-sm-6 col-md-4 col-md-offset-1">
		<div class="jumbotron" style="width:250%">
			
			<h3 class="text-center">
				{{ $post->title}}
			</h3>
			<span>Posted by:</span>
			<a href="{{action('UsersController@show',$post->user->id)}}" title=""> {{$post->user->name}}</a>
			<hr>
			<div class="col-md-offset-4">
				<a href="{{$post->url}}" title="">
					<img src="{{$post->url}}" alt="" class="img img-responsive">
				</a>
			</div>

			<div class="panel panel-default">
			  <div class="panel-heading">
			    <h4 class="panel-title">Content</h4>
			  </div>
			  <div class="panel-body">
					{{ $post->content}}
			  </div>
			</div>

			<div class="pull-left">
				Posted: {{$post->created_at->setTimezone('America/Chicago')->diffForHumans()}}
			</div>
			<br>
			@if(Auth::check())
				<p>
					<a href="{{action('PostsController@edit', $post->id)}}" title="" class="btn btn-primary">
							Edit
					</a>
				</p>
			@endif

		</div>
	</div>	

@stop