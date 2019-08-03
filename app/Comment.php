<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Article;

class Comment extends Model
{
    protected $guarded = [];

    // protected static function boot()
    // {
    //     parent::boot();
    //     static::creating(function($comment)
    //         {
    //             $comment->user_id = auth()->id();
    //         });
    // }

    public function user ()
    {
        return $this->belongsTo(User::class);
    }

    public function article ()
    {
        return $this->belongsTo(Article::class);
    }
}
