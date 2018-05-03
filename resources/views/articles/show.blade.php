@extends('layouts.app')

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
                        <figcaption class="text-center">{{ $comment->user->name }}</figcaption>
                    </figure>
                </div>
                <div class="col-md-10 col-sm-10">
                    <div class="panel panel-default arrow left">
                        <div class="panel-body">
                            <header class="text-left">
                                <div class="comment-title">
                                    {{ $comment->title }}
                                </div>
                                <strong>{{ ucfirst($comment->created_at->diffForHumans())  }}</strong>
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

        <div class="col-12">
            <div class="widget-area no-padding blank">
                <form action="{{ route('comments.store') }}" method="POST">
                    {{ csrf_field() }}

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Oups !</strong> Ajout impossible !<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="form-group">
                        <label form="title">Titre</label>
                        <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                    </div>
                    <div class="form-group">
                        <label form="content">Commentaire</label>
                        <textarea name="content" class="form-control" placeholder="Votre commentaire" >{{ old('content') }}</textarea>
                    </div>

                    <input type="hidden" name="article_id" value="{{ $article->id }}">

                    <button type="submit" class="btn btn-success green"><i class="fa fa-share"></i> Commenter</button>
                </form>
            </div>
        </div>

    </div>
@endsection
