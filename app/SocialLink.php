<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialLink extends Model
{
    protected $fillable = [
        'name', 'url', 'profile_id'
    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class );
    }
}
