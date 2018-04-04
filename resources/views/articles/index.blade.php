@extends('layout')

@section('content')
    <div class="col-md-8">

        <h1 class="my-4">Page Heading
            <small>Secondary Text</small>
        </h1>

        @foreach($articles as $article)
            <div class="card mb-4">
                <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
                <div class="card-body">
                    <h2 class="card-title">{{$article['title']}}</h2>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
                    @foreach($article['tags'] as $tag)
                        <a href="#" class="btn btn-primary">{{$tag}}</a>
                    @endforeach
                </div>
                <div class="card-footer text-muted">
                    Posted on January 1, 2017 by
                    <a href="#">Start Bootstrap</a>
                </div>
            </div>
        @endforeach

    </div>
@endsection
