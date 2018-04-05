@extends('layout')

@section('content')
    <div class="col-md-8">

        <h1 class="my-4">Liste des articles
            <small>Ils sont trop cool !</small>
        </h1>

        @foreach($articles as $article)
            <div class="card mb-4">
                <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
                <div class="card-body">
                    <h2 class="card-title">{{$article->title}}</h2>
                    <p class="card-text">{{$article->content}}</p>
                    <a href="{{ route('articles.show', $article) }}">Lire plus</a>
                </div>
                <div class="card-footer text-muted">
                    Ajouté le {{$article->created_at}}
                </div>
            </div>
        @endforeach

        {{ $articles->links() }}
    </div>
@endsection
