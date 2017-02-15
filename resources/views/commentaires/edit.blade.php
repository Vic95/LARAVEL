@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                @include('messages.errors')

                <div class="panel panel-default">
                    <div class="panel-heading">Modifier un commentaire</div>

                    <div class="panel-body">
                        <form action="{{ route('commentaire.update', $commentaire->id) }}" method="POST">

                            <input type="hidden" name="_method" value="PUT">

                            {{ csrf_field() }}

                            <div class="form-group">
                                <textarea name="content" placeholder="Votre commentaire"
                                          class="form-control">{{ $commentaire->content }}</textarea>
                            </div>

                            <input type="submit" value="Publier" class="btn btn-info">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection