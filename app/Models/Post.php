<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use HasFactory, Likable;

    protected $fillable = [
        'user_id',
        'post_id',
        'body'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function like($user = null, $liked = true)
    {
        $this->likes()->updateOrCreate([
            'user_id' => $user ? $user->id : Auth::id(),
        ], [
            'liked' => $liked
        ]);
    }

    public function dislike($user = null)
    {
        $this->like($user, false);
    }


    public function isLikedBy(User $user)
    {
        return (bool) $user->likes
            ->where('post_id', $this->id)
            ->where('liked', true)
            ->count();
    }


    public function isDislikedBy(User $user)
    {
        return (bool) $user->likes
            ->where('post_id', $this->id)
            ->where('liked', false)
            ->count();
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

}
