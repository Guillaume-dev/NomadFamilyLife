@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h1>Création d'une nouvelle catégorie</h1>


    <form action="{{ url('category') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <input type="text" name="name" class="form-control {!! $errors->has('name') ? 'is-invalid' : '' !!}" placeholder="Nom de la catégorie" value={{ old('name') }}>
            {!! $errors->first('name', '<p class="invalid-feedback text-left">:message</p>') !!}
        </div>
        <button type="submit" class="btn btn-success">Enregistrer</button>
    </form>
</div>
@endsection
