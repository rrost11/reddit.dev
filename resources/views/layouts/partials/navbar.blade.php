<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">
        <img class="img-responsive" src="/img/rr-logo.png" style="width:77px; height:52px; margin-top:-16px; margin-left:-16px;" alt="RR">
      </a>
     
      
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav" style="font-size:17px">
      <li>
        <a  href="{{action('PostsController@index')}}">
          All Posts</span></a>          
      </li>
      @if(!Auth::check())
        <li>
          <a href="{{action('Auth\AuthController@getLogin')}}">
            Login</a>
        </li>
        <li>
          <a href="{{action('Auth\AuthController@getRegister')}}">
           Register</a>
        </li>
      @else

          <li>
            <a href="{{action('UsersController@index')}}">
              Users</a>
          </li>
          
          <li class=""><a href="{{action('PostsController@create')}}">
            Create Post</a>
          </li>

          <li class=""><a href="{{action('Auth\AuthController@getLogout')}}">
            Logout</a>
          </li>
        @endif
        
      </ul>
      
      <form class="navbar-form navbar-right" method="GET" action="{{action('PostsController@index')}}">
        
        <div class="form-group">
          <input type="text" name="searchTitle" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
      </form>
     @if(Auth::check())
        <span><div class="navbar-brand" style="margin-left:190px;">
           Welcome,  {{Auth::user()->name}}!
        </div></span>
      @endif
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>