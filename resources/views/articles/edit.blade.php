@extends('layout')

@section('content')
    <div class="col-md-8">
            <form method="POST" action="{{ route('articles.update', $article->id) }}">
                <input type="hidden" name="_method" value="put" />
                {{ csrf_field() }}

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Oups !</strong> Création impossible !<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="form-group">
                    <label for="article_title">Titre</label>
                    <input type="text" id="article_title" name="title" maxlength="50" value="{{$article->title}}" class="form-control" />
                </div>

                <div class="form-group">
                    <label for="article_content">Contenu</label>
                    <textarea id="article_content" name="content" class="form-control" >{{$article->content}}</textarea>
                </div>

                <div class="form-group">
                    <label for="article_is_enabled">Activé</label>
                    <input type="checkbox" id="article_is_enabled" name="is_enabled" value="1" @if($article->is_enabled) checked="checked" @endif class="form-check" />
                </div>

                <input type="submit" class="btn btn-primary">

            </form>
    </div>
@endsection
