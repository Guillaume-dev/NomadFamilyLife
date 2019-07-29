<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //protected $guarded = [];
    protected $fillable = ['title', 'content', 'url'];   //|-> a priviligiez pour la sécurité

    public function path()
    {
        return "/blog/$this->id";
    }
}
