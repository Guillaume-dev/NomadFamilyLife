<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Comment;
use App\Article;

class CommentsController extends Controller
{
    public function store($id)
    {

        Comment::create([
            'user_id' => auth()->id(),
            'article_id' => $id,
            'content'=> request('content')
        ]);

        return back();
    }
    // public function store(Article $article)
    // {
    //     $article->comments()->create(request()->all());
    //     return back();
    // }
}
