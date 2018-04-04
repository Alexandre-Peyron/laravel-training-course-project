@extends('layout')

@section('content')
    <ul>
        @foreach($articles as $article)
            <li>
                <h3>{{$article['title']}} - {{$article['year']}}</h3>
                @foreach($article['tags'] as $tag)
                    <span>{{$tag}}</span>
                @endforeach
            </li>
        @endforeach
    </ul>
@endsection
