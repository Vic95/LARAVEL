@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        {{ $commentaire->content }}

                        <br>
                        <br>

                        <strong>{{ $commentaire->user->name }}</strong>

                        <br>
                        <a href="{{ route('commentaire.edit', $commentaire->id) }}" class="btn btn-primary">Modifier</a>
                        @if (Auth::check() && Auth::user()->isAdmin)
                        <form method="POST" action="{{ route('commentaire.destroy', $commentaire->id) }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="delete">
                            <input type="submit" value="Supprimer" class="btn btn-danger">
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection