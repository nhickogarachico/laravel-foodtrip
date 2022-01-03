<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentLike extends Model
{
    use HasFactory;

    public $fillable = [
        'user_id',
        'comment_id'
    ];

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }
}
