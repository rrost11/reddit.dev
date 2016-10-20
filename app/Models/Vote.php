<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = ['vote', 'post_id', 'user_id'];
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    public function post()
    {
    	return $this->belongsTo(Post::class);
    }
}