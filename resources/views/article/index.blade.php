@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Exemplo de linha de colunas -->
        <div class="row">
            @foreach($articles as $article )
            <div class="col-md-4">
                <h2>{{ $article->title }}</h2>
                <p>{{ $article->description }}</p>
                <p><a class="btn btn-secondary" href="{{ route('article.show',[$article]) }}" role="button">Ver detalhes »</a></p>
            </div>
            @endforeach
        </div>

        <hr>

    </div>
@endsection
