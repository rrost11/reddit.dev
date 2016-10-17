@extends('layouts.master')

@section('content')
<div class="container">
		<h1> {{ $user->name }} <h1>
		<h3> {{ $user->email }} </h3><br>

		@if (Auth::user()->id == $user->id)
		<a href="{{ action('UsersController@edit', $user->id)}}" class="btn btn-success">Edit User Info</a>
		<br>
		<form method="POST" action="{{ action('UsersController@destroy', $user->id)}}">
	        <input type="hidden" name="_method" value="DELETE">
	        {{ method_field('DELETE') }}
	        {!! csrf_field() !!}
	        <button type="submit" class="btn btn-danger">Delete Account</button>
	    </form><br>
	    @endif
	    <table class="table table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Url</th>
                    <th>Posted</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
    	@foreach ($user->posts as $post)
	    		<tr>
                    <td> {{ $post->id }} </td>
                    <td> {{ $post->title }} </td>                 
                    <td> {{ $post->url }} </td>                 
                    <td>{!! $post->created_at->setTimezone('America/Chicago')->format('l, F jS Y @ h:i:s A') !!}</td>
                    <td><a href="{{ action('PostsController@show', $post->id)}}" class="btn btn-primary"><span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span>    Go To Post</a></td>
                </tr>
		@endforeach            
            </tbody>
        </table>


	    <a href="{{ action('PostsController@index')}}">Go Back to Main Page</a>
	</div>
@stop