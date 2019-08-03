<?php

namespace App;
use App\Category;
use App\Comment;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Article extends Model
{
    protected $guarded = [];
    //protected $fillable = ['title', 'content', 'url', 'user_id'];   //|-> a priviligiez pour la sécurité

    public function path()
    {
        return "/blog/$this->id";
    }

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function category()
    {
      return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
