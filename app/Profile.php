<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable= [
        'email', 'name', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function social_link()
    {
        return $this->hasMany(SocialLink::class);
    }
}
