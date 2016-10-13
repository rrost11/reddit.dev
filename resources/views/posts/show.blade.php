@extends ('layouts.master')

@section ('title', 'Post')

@section ('content')
<div class="page-header">
	<h1>A Post...</h1>
</div>
	<h2>{{ $post->title }}</h2>
	<blockquote>
		<p>{{ $post->content }}</p>
	</blockquote>
		<a href={{ $post->url }}>{{ $post->url }}</a>

@stop