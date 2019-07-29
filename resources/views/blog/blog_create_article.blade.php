@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h1>Création d'un nouvel article</h1>


    <form action="{{ url('blog') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <input type="text" name="title" class="form-control {!! $errors->has('title') ? 'is-invalid' : '' !!}" placeholder="Le nom de votre article" value={{ old('title') }}>
            {!! $errors->first('title', '<p class="invalid-feedback text-left">:message</p>') !!}
        </div>
        <div class="form-group">
            <textarea name="content" rows="3" class="form-control {!! $errors->has('content') ? 'is-invalid' : '' !!}" placeholder="Ici le contenu de votre article">{{ old('content') }}</textarea>
            {!! $errors->first('content', '<p class="invalid-feedback text-left">:message</p>') !!}
        </div>
        <div class="form-group">
            <input type="text" name="url" class="form-control {!! $errors->has('url') ? 'is-invalid' : '' !!}" value="http://placehold.it/350x200">
            {!! $errors->first('url', '<p class="invalid-feedback text-left">:message</p>') !!}
        </div>
        <button type="submit" class="btn btn-success">Enregistrer</button>
        <button type="reset" class="btn btn-danger">reset</button>
    </form>
</div>
@endsection
