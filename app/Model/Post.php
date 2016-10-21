<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends BaseModel
{
    public static $rules = [
        'title' => 'required|min:4',
        'url' => 'required',
        'content' => 'required'
    ];



    public function user()
    {
        return $this->belongsTo('App\User', 'created_by', 'id');
    }

    public static function search($searchTerm)
    {
        return self::join('users', 'users.id', '=', 'posts.created_by')
                    ->where('posts.title', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('posts.content', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('users.name', 'LIKE', '%' . $searchTerm . '%')
                    ->orderBy('posts.created_at');
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    public function upvotes()
    {
        return $this->votes()->where('vote', '=', 1);
    }

    public function downvotes()
    {
        return $this->votes()->where('vote', '=', 0);
    }

}