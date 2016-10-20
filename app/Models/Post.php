<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Vote;

class Post extends BaseModel
{
    public static  $rules = [
            'title' => 'required',
            'url' => 'required',
            'content' => 'required',
        ];

    public function user(){
    	return $this->belongsTo('App\User', 'created_by' , 'id');
    }

    public static function search($searchTerm){
    	return self::where('title', 'LIKE', '%'.$searchTerm.'%')
    		->orWhere('content', 'LIKE', '%'.$searchTerm.'%')->with('user');
    }

     public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    public function voteUp()
    {
        return $this->votes()->where('vote', '=', 1);
    }

    public function voteDown()
    {
        return $this->votes()->where('vote', '=', -1);
    }

    public function voteScore()
    {
        
        $voteup = $this->voteUp()->count();
        $votedown = $this->voteDown()->count();
        return $voteup - $votedown;
    }

}