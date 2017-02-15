@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"></div>
                    <div class="panel-body">
                        {{ $article->content }}

                        <br>
                        <br>

                        <strong>{{ $article->user->name }}</strong>

                        <br>
                        <br>

                        <a href="{{ route('article.edit', $article->id) }}" class="btn btn-primary">Modifier</a>

                        <form method="POST" action="{{ route('article.destroy', $article->id) }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="delete">
                            <input type="submit" value="Supprimer" class="btn btn-danger">
                        </form>
                        <br>
                        <br>
                        <h3>Commentaires</h3><br>
                        @foreach($article->commentaires as $commentaire)
                            <a href="{{ route('commentaire.create', $commentaire->id) }}" class="btn btn-info">Créer un commentaire</a>
                            <ul>
                               <li>{{ $commentaire->content }}</li>
                           </ul>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection