<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends BaseModel
{
    
    public function vote()
    {
    return \App\Vote::where('post_id', $this->id)->sum('vote');
    }

    



    public static  $rules = [
            'title' => 'required',
            'url' => 'required',
            'content' => 'required',
        ];

    public function user(){
    	return $this->belongsTo('App\User', 'created_by' , 'id');
    }

    
    // public funtion getModifiedAttribute()
    // {
    //     return 'foo';
    // }


    public static function search($searchTerm){
    	return self::where('title', 'LIKE', '%'.$searchTerm.'%')
    		->orWhere('content', 'LIKE', '%'.$searchTerm.'%')->with('user');
    }
}