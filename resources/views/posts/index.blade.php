@extends('layouts.master')

@section('title')
    Index
@stop

@section('content')
    
    
    @foreach($posts as $post)
        <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="well show-box">
                <h4 class="text-center">
                    {{ substr($post->title, 0,15) . "..."}}
                </h4>

                <span>User: </span><a href="{{action('UsersController@show',$post->user->id)}}" title="">{{$post->user->name}}
                </a>

                {{-- <a href="{{$post->url}}" title="">
                    <img src="{{$post->url}}" alt="">
                </a>
 --}}
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">Content</h4>
                  </div>
                  <div class="panel-body">
                        {{ substr($post->content, 0,20) . "..."}}
                  </div>
                </div>

                <div class="pull-left">
                    Posted: {{$post->created_at->setTimezone('America/Chicago')->diffForHumans()}}
                </div>
                <br>
                <a href="{{action('PostsController@show', $post->id)}}" title="" class="btn btn-primary text-center">
                    See Post      
                </a>

                <hr>
            </div>
        </div>  
    @endforeach

    <div class="text-center">
        {!! $posts->render() !!}
    </div>
@stop