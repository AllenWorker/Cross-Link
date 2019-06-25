<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentTaggable\Taggable;

class Bookmark extends Model
{
    use Taggable;

    protected $fillable= [
        'name', 'link', 'description' , 'user_id','public',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
