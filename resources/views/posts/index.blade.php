@extends ('layouts.master')

@section ('title', 'Posts')

@section ('content')
<div class="page-header">
    <h1>All Posts</h1>

</div>
{!! $posts->render() !!}
    @foreach ($posts as $post)
        <div class="row">
    <div class="col-md-7">
        <a href="#">
            <img class="img-responsive" src="http://placehold.it/700x300" alt="">
        </a>
   
    </div>
    
    <div class="col-md-5">
        <h3>{{ $post->title }}</h3>
        <h4><a href={{ $post->url }}>{{ $post->url }}</a></h4>
        <p>{{ $post->content }}</p>
        <a class="btn btn-primary" href="#">View Project <span class="glyphicon glyphicon-chevron-right"></span></a>
    </div>
   
</div>
    @endforeach


@stop

<!-- Project One -->
<
<!-- /.row -->

<hr>
<!-- /Project One -->

<!-- Pagination -->
<div class="row text-center">
    <div class="col-lg-12">
        <ul class="pagination">
            <li>
                <a href="#">&laquo;</a>
            </li>
            <li class="active">
                <a href="#">1</a>
            </li>
            <li>
                <a href="#">2</a>
            </li>
            <li>
                <a href="#">3</a>
            </li>
            <li>
                <a href="#">4</a>
            </li>
            <li>
                <a href="#">5</a>
            </li>
            <li>
                <a href="#">&raquo;</a>
            </li>
        </ul>
    </div>
</div>
<!-- /.row -->

<hr>
<!-- /Pagination -->