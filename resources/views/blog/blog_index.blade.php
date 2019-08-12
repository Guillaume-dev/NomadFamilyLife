@extends('layouts.app')

@section('content')

<section class="section_blog">

    <div class="container text-center">
        <div class="row justify-content-center  contentHome">

                <h1 class="HomeTitle">Nomad Family Life :</h1>

        </div>
        <hr>
    </div>

    <div class="container d-flex">
            <div class="col-12">
                 {{-- ICI BOUTON D EDITION EN MODE ADMIN --}}
                 @guest
                 @else
                     {{-- Obliger de mettre le guest et le else sinon pas moyen d'avoir l'affichage du boutton en mode admin --}}
                     @if (Auth::user()->admin)
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category )
                            <tr>
                                <th scope="row">{{ $category->id }}</th>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->slug }}</td>
                                <td>
                                    <form action="{{ url("/category/$category->id/delete") }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button class="btn btn-danger">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    @endif
                    @endguest
                    @forelse ($articles as $article)
                    <article class="apercu_article_blog">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h1>{{ $article->title }}</h1>
                                        <div class="d-flex justify-content-between">
                                            <span>
                                                <strong>{{ $article->category->name }}</strong> -
                                                Publié par {{ $article->user->name }}
                                                écrit le {{ ucwords($article->created_at->formatLocalized("%a %e %b %Y")) }}
                                            </span>
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
                                        <p><img src="{{ $article->url }} " alt="" style="float:left; margin:5px;"> {{ str_limit($article->content, $limit = 350, $end = ' ...') }}</p>
                                        <a href="{{  url($article->path()) }}">Lire la suite ...</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                    <hr>
                        @empty
                        <h3 class="text-center">Pas d'article trouvé</h3>
                    @endforelse
                    </div>
                    <div class="col-2">
                            @forelse($categories as $category)
                                <p><a href="/blog?category={{ $category->id }}">{{ $category->name }}</a></p>
                                @empty
                                PAS DE CATEGORIES
                            @endforelse
                    </div>
    </div>


    <div class="container">
        <div class="row justify-content-center">
            {{ $articles->links() }}
        </div>
    </div>
</section>

@endsection
