<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        // $user = Auth::user()->id;

        // if (!$user) {
        //     Log::info("User with $id not found.");
        //     abort(404);
        // }

        // $data = compact('user');
        ///dd($data);
        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $user = User::find($id);
        
        if (!$user) {
            Log::info("User with $id not found.");
            abort(404);
        }

        $data = compact('user');
        ///dd($data);
        return view('users.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        
        if (!$user) {
            Log::info("User with $id not found.");
            abort(404);
        }

        $data = compact('user');
        ///dd($data);
        return view('users.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        //dd($post);
        if (!$user) {
            Log::info("User with $id not found for edit.");
            abort(404);
        }

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();
        $request->session()->flash('message', 'Your account has been updated!');
        return redirect()->action('UsersController@index', $user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        
        $user = User::find($id);

        if (!$user) {
            Log::info("User with $id not found for delete.");
            abort(404);
        }

        $posts = Post::where('created_by', $id)->delete();
        $user->delete();
        $request->session()->flash('message', 'Your Account has been deleted!');
        return redirect()->action('PostsController@index');
    }

    public function editPassword($id) {

        $user = User::find($id);

        if (!$user) {
            Log::info("User with $id not found for edit.");
            abort(404);
        }

        return view('users.password')->with('user', $user);
    }

    public function updatePassword(Request $request, $id) {

        $user = User::find($id);
//dd($user);
        if (!$user) {
            Log::info("User with $id not found for edit.");
            abort(404);
        }

        $user->password = Hash::make($request->input('password'));
        $user->save();
        $request->session()->flash('message', 'Your password has been updated!');
        return redirect()->action('UsersController@index', $user->id);

    }
}