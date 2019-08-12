@extends('layouts.app')

@section('content')

<section class="section_blog_article">
    <div class="container text-center ">
        <div class="row justify-content-center  contentHome">
            <div class="col-md-12">
                <h1 class="HomeTitle">Nomad Family Life :</h1>

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
                          {{-- ICI BOUTON D EDITION EN MODE ADMIN --}}
                        @guest
                            @else
                            {{-- Obliger de mettre le guest et le else sinon pas moyen d'avoir l'affichage du boutton en mode admin --}}
                            @if (Auth::user()->admin)
                                <div class="d-flex justify-content-end">
                                    <a href="{{ url($article->path()) . '/edit' }}">
                                        <button class="btn btn-outline-success">Editer</button>
                                    </a>
                                    <form action="{{ url($article->path() . '/delete')  }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-outline-danger">Supprimer</button>
                                    </form>
                                </div>

                            @endif
                        @endguest
                    </div>

                    <div class="card-body">
                        <p><img src="{{ $article->url }} " alt="" style="float:left; margin:5px;"> {{ $article->content }}</p>
                    </div>
                </div>
                    <hr>
                    <form class="mt-5 mb-5" action="{{ url("{$article->path()}/comments") }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <textarea class="commentaire_input" name="content" placeholder="Votre commentaire..." cols="100" rows="10">{{ old('content') }}</textarea>
                        </div>
                        <button class="btn btn-dark">Envoyer votre commentaire</button>
                    </form>

                    <div class="card">
                        @foreach ($article->comments()->latest()->get() as $comment )
                            <div>
                                <strong>{{ $comment->user->name }}</strong> -
                                {{ $comment->created_at->diffForHumans() }}
                            </div>
                            <div class="card-body">
                                {{ $comment->content }}
                            </div>
                        @endforeach
                    </div>
            </div>
        </div>
    </article>
</section>

@endsection
