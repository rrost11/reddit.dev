@extends('layouts.master')

@section('title', $post->title)

@section('header', '"' . $post->title . '"')

@section('content')

<br>
	<div class="col-md-4 col-md-offset-1">
		<div class="jumbotron" style="width:250%">
			
			<h3 class="text-center">
				{{ $post->title}}
			</h3>
			<span>Posted by:</span>
			<a href="{{action('UsersController@show',$post->user->id)}}" title=""> {{$post->user->name}}</a>
			<hr>
			<div class="col-md-offset-4">
				<a href="{{$post->url}}" title="">
					<img src="/img/question-mark.jpg" alt="" class="img img-responsive" style="width:150px;height:150px;">
				</a>
			</div>
			<br>
			<div class="panel panel-primary">
			  <div class="panel-heading">
			    <h3 class="panel-title">Content</h3>
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
			<div>
					<br>
					<a href="{{action('PostsController@edit', $post->id)}}" title="" class="btn btn-primary pull-right">
							Edit
					</a>
						<form  method="POST" action="{{ action('PostsController@setVote') }}">
							{!! csrf_field() !!}
							<input type="hidden" name="vote" value="1">
							<input type="hidden" name="post_id" value="{{ $post->id }}">
							<button type="submit" class="btn btn-success pull-left"><span class="glyphicon glyphicon-thumbs-up"> {{ $post->upVotes->count() }} </span></button>
						</form>
						<form method="POST" action="{{ action('PostsController@setVote') }}">
							{!! csrf_field() !!}
							<input type="hidden" name="vote" value="-1">
							<input type="hidden" name="post_id" value="{{ $post->id }}">
							<button type="submit" class="btn btn-danger pull-left"><span class=" glyphicon glyphicon-thumbs-down"> {{ $post->downVotes->count() }} </span></button>
						</form>
						
				</div>
				<br>
				
			@endif

		</div>
	</div>
	<br>	

@stop