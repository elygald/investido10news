@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Exemplo de linha de colunas -->
        <div class="row">
            <div class="col-md-4">
                <h2>{{ $article->title }}</h2>
                <p>{{ $article->description }}</p>
                <p>{{ date('d/m/Y H:i', strtotime($article->created_at ))}}</p>
                <p><a class="btn btn-secondary" href="{{ route('article.edit',[$article]) }}" role="button">Editar</a></p>
            </div>
        </div>

        <hr>

    </div>
@endsection
