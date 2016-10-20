@extends('layouts.master')

@section('title')
    Index
@stop

@section('content')
<h2 class="white" style="text-align: center">Users</h2>
<br>
    <form class="" method="GET" action="{{action('UsersController@index')}}">
          <div class="navbar navbar-left">
            <input type="text" name="searchName" class="form-control" placeholder="Search">
          </div>
          <button type="submit" class="btn">User Search</button>
    </form>
<br>
    <hr>
    <table class="table table-striped">
    <thead>
        <tr>
            <th class="white">ID</th>
            <th class="white">Name</th>
            <th class="white">Email</th>
        </tr>
    </thead>
    @foreach($users as $user)
        <tbody>
            <tr>
                <td>
                    <a href="{{action('UsersController@edit', $user->id)}}" class="btn btn-primary btn-sm">Edit</a>
                    <a href="{{action('UsersController@destroy', $user->id)}}" class="btn btn-danger btn-sm">Delete</a>
                </td>
                <td>
                <a href="{{action('UsersController@show', $user->id)}}" title="">
                    
                    {{$user->name}}
                </a>
                </td>
                <td>{{$user->email}}</td>
            </tr>
        </tbody>
    @endforeach
    </table>

    <div class="text-center">
        {{-- {!! $users->render() !!} --}}

        {!! $users->appends(['searchName' => Request::get('searchName')])->render() !!}
    </div>
@stop