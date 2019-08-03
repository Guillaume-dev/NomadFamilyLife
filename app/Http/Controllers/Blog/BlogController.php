<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use App\Http\Requests\BlogRequest;
use Illuminate\Support\Facades\Auth;
use App\Category;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {
        $articles =Article::latest()->paginate(6);
        $categories = Category::get();
        if (\request( 'category')) {
            $articles = Article::where('category_id', request('category'))->paginate(6);
            return view ('blog.blog_index', compact('articles', 'categories'));
        }
        return view ('blog.blog_index', compact('articles', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        return view ('blog.blog_create_article', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request)
    {

    $article = Article::create([
        'user_id' => Auth()->id(),
        'category_id' => $request->category_id,
        'title' => $request->title,
        'content' => $request->content,
        'url' => $request->url,
    ]);
    return redirect($article->path());
    //    $article =  Article::create($request->all());
    //     return redirect($article->path());
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
        $article = Article::where('id', $id)->first();
        return view ('blog.blog_edit_article', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    public function update(Request $request, $id)
    {
        $article = Article::where('id', $id)->first();
        $article->title = $request->title;
        $article->content = $request->content;
        $article->url = $request->url;
        $article->save();

        return redirect($article->path());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $article = Article::where('id', $id)->first();
        $article->delete();
        return redirect('blog');
    }
}
