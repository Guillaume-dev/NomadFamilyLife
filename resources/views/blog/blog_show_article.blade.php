@extends('layouts.app')

@section('content')

<div class="container text-center">
    <div class="row justify-content-center  contentHome">
        <div class="col-md-12">
            <h1 class="HomeTitle">Nomad Family Life :</h1>
            <h2 class="HomeUnderTitle">Ou la vie d'une Famille Nomade</h2>
        </div>
    </div>
    <hr>
</div>
<article class="apercu_article_blog">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h1>{{ $article->title }}</h1>
                    <div class="d-flex justify-content-between">
                        <span>Publié par {{ $article->user->name }} écrit le {{ ucwords($article->created_at->formatLocalized("%a %e %b %Y")) }}</span>
                        <span>Mise à jour  {{  $article->updated_at->diffForHumans() }}</span>
                    </div>
                </div>
                <div class="card-body">
                    <p><img src="{{ $article->url }} " alt="" style="float:left; margin:5px;"> {{ $article->content }}</p>
                </div>
            </div>
        {{-- ICI BOUTON D EDITION EN MODE ADMIN --}}
        @guest
            @else
            {{-- Obliger de mettre le guest et le else sinon pas moyen d'avoir l'affichage du boutton en mode admin --}}
            @if (Auth::user()->admin)
                <div class="d-flex justify-content-end">
                    <a href="{{ url($article->path()) . '/edit' }}">
                        <button class="btn btn-outline-success">Editer</button>
                    </a>
                </div>
            @endif
        @endguest
        </div>
    </div>
</article>
@endsection
