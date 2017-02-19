@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <p style="text-align: center;">Article rédigé par: <strong>{{ $article->user->name }}</strong></p>
                    <div class="panel-heading"></div>
                    <div class="panel-body">
                        {{ $article->content }}
                        <br>
                        <br>
                        @if($article->liked())
                        <form method="POST" action="{{ route('article.unlike', $article->id) }}">
                            {{ csrf_field() }}
                            <input type="submit" value="Dislike" class="btn btn-info">
                        </form>
                        @else
                            <form method="POST" action="{{ route('article.like', $article->id) }}">
                                {{ csrf_field() }}
                                <input type="submit" value="Like" class="btn btn-info">
                            </form>
                        @endif
                        <br>
                        <br>

                        <a href="{{ route('article.edit', $article->id) }}" class="btn btn-primary">Modifier</a>
                        @if (Auth::check() && Auth::user()->isAdmin)
                        <form method="POST" action="{{ route('article.destroy', $article->id) }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="delete">
                            <input type="submit" value="Supprimer" class="btn btn-danger">
                        </form>
                        @endif
                        <br>
                        <p style="text-align: center;">Partager cet article sur les RS:<br>

                        @include('layouts.share', [
                                'url' => request()->fullUrl(),
                                'description' => 'This is really cool link',
                                'image' => 'http://placehold.it/300x300?text=Cool+link'
                            ])
                        </p>
                        <br>
                        <h3 style="text-align: center;">Commentaires</h3><br>
                        @foreach($article->commentaires as $commentaire)
                            <a href="{{ route('commentaire.create', $commentaire->id) }}" class="btn btn-info" >Créer un commentaire</a>
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