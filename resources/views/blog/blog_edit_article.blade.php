
@extends('layouts.app')
@php $title = $article->title; @endphp
@section('content')
<div class="container text-center">
    <h1>Editer l'article</h1>


    <form method="POST" action="{{ $article->path() . '/update' }}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="form-group">
            <input type="text" name="title" class="form-control {!! $errors->has('title') ? 'is-invalid' : '' !!}" placeholder="Le nom de votre article" value={{ $article->title }}>
            {!! $errors->first('title', '<p class="invalid-feedback text-left">:message</p>') !!}
        </div>
        <div class="form-group">
            <textarea name="content" rows="3" class="form-control {!! $errors->has('content') ? 'is-invalid' : '' !!}" placeholder="Ici le contenu de votre article">{{ $article->content }}</textarea>
            {!! $errors->first('content', '<p class="invalid-feedback text-left">:message</p>') !!}
        </div>
        <div class="form-group">
            <input type="text" name="url" class="form-control {!! $errors->has('url') ? 'is-invalid' : '' !!}" value="{{ $article->url }}">
            {!! $errors->first('url', '<p class="invalid-feedback text-left">:message</p>') !!}
        </div>
        <button type="submit" class="btn btn-outline-success">Mettre à jour</button>
    </form>
</div>
@endsection
