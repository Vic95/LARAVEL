@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @include('messages.success')
                <div class="panel panel-default">
                    <div class="panel-heading">Liste des commentaires</div>

                    <div class="panel-body">
                        <ul>
                            @foreach($commentaires as $commentaire)
                                <li><a href="{{ route('commentaire.show', $commentaire->id) }}">{{ $commentaire->content }}</a></li>
                            @endforeach
                        </ul>

                        {{ $commentaires->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection