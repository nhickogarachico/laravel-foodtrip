<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

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

    public function relationshipTypeSender($userId)
    {
        return UserRelationship::where('user_first_id', $this->id)->where('user_second_id', $userId)->first();
    }

    public function relationshipTypeInvited($userId)
    {
        return UserRelationship::where('user_second_id', $this->id)->where('user_first_id', $userId)->first();
    }

    public function friendsIRequested()
    {   
        return $this->belongsToMany(User::class, 'user_relationships', 'user_first_id', 'user_second_id')->where('type', 3);
    }

    public function friendsTheyRequested()
    {
        return $this->belongsToMany(User::class, 'user_relationships', 'user_second_id', 'user_first_id')->where('type', 3);
    }

    public function getFriendsAttribute()
    {
        if(!array_key_exists('friends', $this->relations)) $this->loadFriends();

        return $this->getRelation('friends');
    }

    
    protected function loadFriends()
    {
        if(!array_key_exists('friends', $this->relations))
        {
            $friends = $this->mergeFriends();

            $this->setRelation('friends', $friends);
        }
    }

    protected function mergeFriends()
    {
        return $this->friendsIRequested->merge($this->friendsTheyRequested);
    }
}
