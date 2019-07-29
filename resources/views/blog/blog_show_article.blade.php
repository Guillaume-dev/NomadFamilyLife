@extends('layouts.app')

@section('content')

<div class="container text-center">
    <h2>Article {{ $article->id }}/{{ $article->title }}</h2>
    <div class="row text-justify">
        <p><img src="{{ $article->url }}" alt="" style="float:left; margin-right:10px;">{{ $article->content }}</p>
    </div>
    <hr>
</div>

@endsection
