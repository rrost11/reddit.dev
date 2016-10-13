@extends('layouts.master')

@section('content')
<div>
	<section>	

    <h1 class="text-center">Create a New Post</h1>
    <form class="form" action="{{ action('PostsController@store') }}" method="POST">
        {!! csrf_field() !!}
        <div class="form-group col-md-8 col-md-offset-2 col-xs-12">
            @if($errors->has('title'))
                <div class="alert alert-danger">
                    {{ $errors->first('title') }}
                </div>
            @endif
            <label for="title">Title</label>
            <input id="title" placeholder="My First Post!" class="form-control" type="" name="title">
        </div>
        <div class="form-group col-md-8 col-md-offset-2 col-xs-12">
            <label for="url">URL</label>
            <input id="url" placeholder="http://google.com" class="form-control" type="" name="url">
        </div>

        <div class="form-group col-md-8 col-md-offset-2 col-xs-12">
            <label for="content">Content</label>
            <textarea name="content" id="content" class="form-control" placeholder="Laravel is Fun!"></textarea>
        </div>
        <div class="col-md-8 col-md-offset-2 col-xs 12">
            <input class="btn btn-block btn-primary" type="submit">
        </div>
        
    </form>
	</section>
</div>
@stop