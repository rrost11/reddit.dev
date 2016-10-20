@extends('layouts.master')

@section('title')
    Create a Post
@stop

@section('content')
<h3 class="white" style="text-align: center">Create Post</h3>
<br>
<hr>
    
    <form method="POST" action="{{action('PostsController@store')}}">
        <div class="form-group">
            {!! csrf_field() !!}
        </div>

      <div class="form-group">
        <label for="title"><h5 class="white">Title</h5></label>
        <input type="text" name="title" class="form-control"  placeholder="Title" value="{{old('title')}}">
      </div>
      @if($errors->has('title'))
            <div class="alert alert-danger">
                {{$errors->first('title')}}
            </div>
        @endif

      <div class="form-group">
        <label for="url"><h5 class="white">URL</h5></label>
        <input type="text" class="form-control" name="url" placeholder="URL" value="{{old('url')}}">
      </div>
      @if($errors->has('url'))
            <div class="alert alert-danger">
                {{$errors->first('url')}}
            </div>
        @endif

      <div class="form-group">
        <label for="content"><h5 class="white">Content</h5></label>
        <textarea class="form-control" rows="3" name="content" placeholder="content" >{{old('content')}}</textarea>
      </div>
      @if($errors->has('content'))
            <div class="alert alert-danger">
                {{$errors->first('content')}}
            </div>
        @endif
      
      <button type="submit" class="btn">Submit</button>
    </form>
@stop