<?php

namespace App;

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

}
