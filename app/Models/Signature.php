<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Signature extends Model
{
    /**
     * The attributes that are mass assignable.
     *logo_image_path
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'title', 'phone', 'email', 'address', 'linkedin_url', 'logo_path', 'profile_image_path'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
