<!DOCTYPE HTML>
<html>
    <head>
        <title>@yield('title')</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        @yield('top-scripts')
        

        @yield('head')

    </head>
    <body>

        @include('layouts.partials.navbar')

        <div class="container">


    @if(session()->has('SUCCESS_MESSAGE'))
        <div class="alert alert-success">
            <p>{{ session('SUCCESS_SESSION') }}</p>
        </div>
    @endif



    @if(session()->has('ERROR_MESSAGE'))
        <div class="alert alert-danger">
            <p>{{ session('ERROR_SESSION') }}</p>
        </div>
    @endif




{{-- Page Heading --}}

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">@yield('page-heading')
        <small>@yield('secondary-text')</small>
        </h1>
    </div>
</div>

           

                @yield('content')

            

            @include('layouts.partials.footer')
        
        </div>
{{-- /.container --}}

        {{-- javascript --}}
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        {{-- jQuery --}}
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha256-/SIrNqv8h6QGKDuNoLGA4iret+kyesCkHGzVUUV0shc=" crossorigin="anonymous"></script>
        
        @yield('bottom-scripts')

    </body>
</html>