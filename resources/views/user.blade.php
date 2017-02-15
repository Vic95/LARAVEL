@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Profil</div>

                    <div class="panel-body">
                        @if(Auth::check())
                            <h3>Vos informations</h3>
                            <ul>
                                <li>{{ Auth::user()->name }}</li>
                                <li>{{ Auth::user()->email }}</li>
                                <li>{{ Auth::user()->created_at }}</li>
                            </ul>

                            <h3>Vos articles</h3>
                            <ul>
                                @forelse(Auth::user()->articles as $article)
                                    <li><a href="{{ route('article.show', $article->id) }}">{{ $article->title }}</a></li>
                                @empty
                                    Vous n'avez pas encore publié d'article.
                                @endforelse
                            </ul><br/>
                            <h3>Vos commentaires</h3>
                            <ul>
                                @forelse(Auth::user()->commentaires as $commentaire)
                                    <li><a href="{{ route('commentaire.show', $commentaire->id) }}">{{ $commentaire->content }}</a><br/>
                                        <a href="{{ route('commentaire.edit', $commentaire->id) }}" class="btn btn-primary">Modifier le commentaire</a>
                                        <p>ou</p>
                                        <form method="POST" action="{{ route('commentaire.destroy', $commentaire->id) }}">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="delete">
                                            <input type="submit" value="Supprimer le commentaire" class="btn btn-danger">
                                        </form>
                                    </li>
                                @empty
                                    Vous n'avez pas encore publié d'article.
                                @endforelse
                            </ul>
                        @else
                            Vous n'êtes pas connecté.
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
