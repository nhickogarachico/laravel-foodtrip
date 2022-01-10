<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRelationship extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_first_id',
        'user_second_id',
        'type'
    ];

    public function firstUser()
    {
        return $this->belongsTo(User::class, 'user_first_id');
    }

    public function secondUser()
    {
        return $this->belongsTo(User::class, 'user_second_id');
    }

}
