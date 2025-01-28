<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable =[
        'user_id',
        'profile_picture',
        'about',
        'company',
        'country',
        'city',
        'address',
        'phone',
        'ig_account',
        'fb_account',
        'tw_account',
        'linkedin_account',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
