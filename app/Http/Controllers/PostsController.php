<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       $posts = Post::paginate(8);
       $data['posts'] = $posts;

       return view('posts.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->session()->flash('ERROR_MESSAGE', 'Post was not saved. Please see messages under inputs');

        $this->validate($request,Post::$rules);

        $request->session()->forget('ERROR_MESSAGE');

        $post = new Post();
        $post->created_by = 1;
        $post->title= $request->get('title');
        $post->url= $request->get('url');
        $post->content= $request->get('content');


        $post->save();


        Log::info("Saving post values {$post->created_by} {$post->title} {$post->url}
            {$post->content}");

        
        $request->session()->flash('SUCCESS_MESSAGE', 'Post was successfully saved.');
        
        // return redirect()->action('PostsController@index');
        //go to show and pass the id to show the record added
        return redirect()->action('PostsController@show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findorfail($id);


        $data['post'] = $post;
        return view('posts.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findorfail($id);

        $data['post'] = $post;
        return view('posts.edit')->with($data);
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
        $request->session()->flash('ERROR_MESSAGE', 'Post was not updated. Please see messages under inputs');

        $this->validate($request,Post::$rules);

        $request->session()->forget('ERROR_MESSAGE');

        $post = Post::findorfail($id);

        $post->title = $request->get('title');
        $post->url = $request->get('url');
        $post->content = $request->get('content');
        $post->save();

        $request->session()->flash('SUCCESS_MESSAGE', 'Post was successfully updated.');

        // return redirect()->action('PostsController@index');
        return redirect()->action('PostsController@show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $post = Post::findorfail($id);

        $post->delete();
        return redirect()->action('PostsController@index');
    }
}