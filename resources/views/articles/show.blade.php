@extends('layout')

@section('content')
    <div class="col-md-8">
        <div class="card mb-4">
            <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
            <div class="card-body">
                <h2 class="card-title">{{$article->title}}</h2>
                <p class="card-text">{{$article->content}}</p>
            </div>
            <div class="card-footer text-muted">
                Ajouté le {{$article->created_at}}
            </div>
        </div>

        <hr>

        <h4>Commentaires</h4>

        @foreach($article->comments as $comment)
            <article class="row">
                <div class="col-md-2 col-sm-2 hidden-xs">
                    <figure class="thumbnail">
                        <img class="img-fluid user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
                        <figcaption class="text-center">username</figcaption>
                    </figure>
                </div>
                <div class="col-md-10 col-sm-10">
                    <div class="panel panel-default arrow left">
                        <div class="panel-body">
                            <header class="text-left">
                                <div class="comment-title">
                                    {{ $comment->title }}
                                </div>
                                <strong>{{ $comment->created_at->diffForHumans()  }}</strong>
                            </header>
                            <div class="comment-post">
                                <p>
                                    {{ $comment->content }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        @endforeach
    </div>
@endsection
