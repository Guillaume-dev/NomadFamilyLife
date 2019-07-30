<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use App\Http\Requests\BlogRequest;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {
        $articles = Article::orderBy('created_at', 'desc')->paginate(6);

        return view ('blog.blog_index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('blog.blog_create_article');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request)
    {
    //METHODE 1
        // $article = new Articles();
        // $article->title = request('title');
        // $article->content = request('content');
        // $article->url = request('url');
        // $article->save();
        // return "Votre article a bien été enregistré !";
    //METHODE 2
        // Article::create([
        //     'title' => request('title'),
        //     'content' => request('content'),
        //     'url' => request('url'),
        // ]);
        // return "Votre article a bien été enregistré !";
    //METHODE 3

       $article =  Article::create($validedData);
        return redirect($article->path());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show ($id)
    {
        $article = Article::find($id);
        //return dd($article);
        return view ('blog.blog_show_article', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
