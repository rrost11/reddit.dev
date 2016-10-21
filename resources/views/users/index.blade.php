@extends('layouts.master')

@section('title', 'All Users')

@section('header', 'All Users')

@section('content')
<h2 class="white" style="text-align: center">Users</h2>
<br>

    <hr>
    <br>
    <table class="table table-striped">
    <thead>
        <tr>
            <th class="white">User ID</th>
            <th class="white">Name</th>
            <th class="white">Email</th>
            <th class="white">Member Since</th>
        </tr>
    </thead>
    @foreach($users as $user)
        <tbody>
            <tr>
            <td>{{$user->id}}</td>
                <td><a href="{{ action('UsersController@show', $user->id)}}">{{ $user->name }}</a></td>
                <td>{{$user->email}}</td>
                
                <td>{{$user->created_at->diffForHumans()}}</td>
                
                
            </tr>
        </tbody>
    @endforeach
    </table>

    <div class="text-center">
        {{-- {!! $users->render() !!} --}}

        {!! $users->appends(['searchName' => Request::get('searchName')])->render() !!}
    </div>
@stop