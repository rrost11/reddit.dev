@extends('layouts.master')

@section('title')
    Index
@stop

@section('content')

<h2 class="white" style="text-align: center">All Posts</h2>
<br>
<hr>
   
    
    @foreach($posts as $post)
        <div class="col-xs-12 col-sm-6 col-md-3">
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
                        {{ substr($post->content, 0,22) . "..."}}
                  </div>
                </div>

                <center><div class="">
                    Created: {{$post->created_at->diffForHumans()}}
                </div></center>
                <br>
                <center><div>
                    <span class="badge badge-success">
                        Post Score:<span class="badge-text badge-success">42</span>
                    </span> 
                </div></center>
            
                <hr>
                <div class="row">
                
                
                
                    <a href="{{action('PostsController@show', $post->id)}}" title="" class="btn btn-primary">
                        View Post      
                    </a>
                    <div class="ui-group-buttons pull-right">
                      <a href="#" class="btn btn-success" role="button">
                        
                            <span class="glyphicon glyphicon-thumbs-up"></span>
                        </a>
                        <div class="or"></div>
                        <a href="#" class="btn btn-danger" role="button">
                        
                            <span class="glyphicon glyphicon-thumbs-down"></span>
                        </a>
                    
                       
                    </div>
                   </div>     
                
            
            </div>
        </div> 
    @endforeach


    <div class="text-center">

        {!! $posts->appends(['searchTitle' => Request::get('searchTitle')])->render() !!}
      
    </div>
       

@stop