@extends('layouts.master')

@section('title', 'All Posts')

@section('header', 'All Posts')

@section('content')

<h2 class="white text-center">All Posts</h2>
<br>

   
    
    @foreach($posts as $post)
        <div class="col-xs-12 col-sm-6 col-md-4">
            <div class="well show-box">
                <h3 class="text-center">
                    {{ substr($post->title, 0,14) . "..."}}
                </h3>

                <center><span>Posted By: </span><a href="{{action('UsersController@show',$post->user->id)}}" title="">{{$post->user->name}}
                </a></center>
                <br>
                <div class="">
                    <a href="{{$post->url}}" title="">
                        <center><img src="/img/question-mark.jpg" alt="" class="img img-responsive" style="width:75px;height:75px;"></center>
                    </a>
                </div>
                <br>
                <div class="panel panel-default">
                  
                  <div class="panel-body text-center">
                        {{ substr($post->content, 0,35) . "..."}}
                  </div>
                </div>

                <center><div class="">
                    Created: {{$post->created_at->diffForHumans()}}
                </div></center>
                <br>
                @if(Auth::check())
                <div class="row">
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
                      
                        @endif
            
                
                    <a href="{{action('PostsController@show', $post->id)}}" title="" class="btn btn-primary pull-right">
                        View Post      
                    </a>
                    
                    <br>
                   </div>     
                
            
            </div>
        </div> 
    @endforeach


    <div class="text-center">

        {!! $posts->appends(['searchTitle' => Request::get('searchTitle')])->render() !!}
      
    </div>
       

@stop