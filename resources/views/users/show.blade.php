@extends('layouts.master')

@section('title')
User {{$user->id}}  
@stop

@section('content')
    
    <h1 class="white" style="text-align: center">User Info</h1>
    <br>
    <hr>
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="white">ID</th>
                <th class="white">Name</th>
                <th class="white">Email</th>
                <th class="white">Member since</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->created_at->diffForHumans()}}</td>
                
            </tr>
        </tbody>
    </table>

    <a href="{{action('UsersController@edit', $user->id)}}" title="" class="btn btn-success">Edit User</a>
    <br>
    <br>
    <h3 class="white">Posts: {{count($user->posts) ? count($user->posts) : "No posts found."}}</h3>
    <hr>
    @foreach($user->posts as $post)
        @if(count($user->posts) > 8)
            <div class="col-xs-12 col-sm-6 col-md-3">
        @elseif(count($user->posts) < 7 && count($user->posts) > 4)
            <div class="col-xs-12 col-sm-6 col-md-4">
        @else
            <div class="col-xs-12 col-md-6">
        @endif
            <div class="well show-box">
            
                <h3 class="text-center">
                    {{ $post->title}}
                </h3>
                
                <hr>
                <div class="col-md-offset-3">
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
                        {{ substr($post->content, 0, 100) . "..."}}
                  </div>
                </div>

                <div class="pull-left">
                    Posted At: {{$post->created_at->diffForHumans()}}
                </div>
                <br>
                <br>    
                <div class="row">
                <div>
                    <a href="{{action('PostsController@show', $post->id)}}" title="" class="btn btn-primary">
                        Go to Post      
                    </a>
                    @if(Auth::check())
                
                        <a href="{{action('PostsController@edit', $post->id)}}" title="" class="btn btn-primary pull-right">
                            Edit Post
                        </a>
                </div>
                <hr>
                
                
                
                </div>
                @endif


            </div>
        </div>

    @endforeach


@stop