@extends('layouts.app')

@section('content')
<div>
    <hr>
</div>
<div class="container text-center">
    <h1>Bienvenue sur ce blog</h1>
    <h2>Voici nos derniers articles</h2>
</div>
<div>
    <hr>
</div>
<div>
    @foreach ($articles as $article)
        <div class="container text-center">
            <h2>Article {{ $article->id }}/{{ $article->title }}</h2>
            <div class="row text-justify">
                <p><img src="{{ $article->url }}" alt="" style="float:left; margin-right:10px;">{{ $article->content }}</p>
                <a href="{{  url($article->path()) }}">Lire la suite ...</a>
            </div>
            <hr>
        </div>
    @endforeach
</div>

@endsection
