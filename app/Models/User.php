<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'birthday',
        'username',
        'email',
        'password',
        'avatar',
        'bio'
    ];

    protected $hidden = [
        'password'
    ];

    public function posts()
    {
        return $this->hasMany(Post::class)->orderBy('created_at', 'desc');
    }

    public function users()
    {
        return $this->hasMany(User::class)->orderBy('created_at', 'desc');
    }

    public function requestTo()
    {
        return $this->hasMany(UserRelationship::class, 'user_first_id')->where('type', '1');
    }

    public function requests()
    {
        return $this->hasMany(UserRelationship::class, 'user_second_id')->where('type', '1');
    }
}
