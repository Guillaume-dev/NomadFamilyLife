@extends('layouts.app')

@section('content')

<div>
    <hr>
</div>

@foreach ($articles as $article)
<article class="apercu_article_blog">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h1>{{ $article->title }}</h1> écrit le {{ date('d-m-Y', strtotime($article->created_at)) }} à {{ date('H:i', strtotime($article->created_at)) }}</div>

                <div class="card-body">
                    <p><img src="{{ $article->url }} " alt="" style="float:left; margin:5px;"> {{ str_limit($article->content, $limit = 350, $end = ' ...') }}</p>
                    <a href="{{  url($article->path()) }}">Lire la suite ...</a>
                </div>
            </div>
        </div>
    </div>
</article>
@endforeach

<div class="container">
    <div class="row justify-content-center">
        {{ $articles->links() }}
    </div>
</div>

@endsection
