@extends('layouts.app')

@section('content')

    <div class="container jumbotron index-container">
        <h1>Les articles</h1>
        @auth
            <a href="{{ route('articles.create') }}">
                <i class="fas fa-plus-circle fa-lg">Ajouter un Article</i>
            </a><br><br>
        @endauth
        <div class="row index-wrapper">
        @if(count($articles))
                @foreach ($articles as $article)
                    <div class="col-sm-4">
                        <div class="card index-item">
                            <img data-src="{{ Storage::url($article->images[0]->src) }}" alt="{{ $article->images[0]->alt }}" style="height: 180px; width: 180px; display: block;" src="{{ Storage::url($article->images[0]->src) }}" data-holder-rendered="true">
                            <h5>{{ $article->designation }}</h5>
                            <p>{{ $article->description }}</p>
                            <p>{{ $article->type->designation }}</p>
                            @foreach($article->matters()->get() as $matter)
                                <p><small class="text-muted">{{ $matter->designation }}</small></p>
                            @endforeach

                            <a href="{{ route("articles.show",['id' => $article->getKey()]) }}" class="btn btn-primary show-link">En savoir plus</a>

                            @auth
                                <a href="{{ route('articles.edit', ['id' => $article->getKey()]) }}">
                                    <i class="fas fa-edit fa-2x"></i>
                                </a>
                                <a href="{{ route('articles.delete', ['id' => $article->getKey()]) }}">
                                    <i class="fas fa-trash fa-2x"></i>
                                </a>
                            @endauth
                        </div>
                    </div>
                @endforeach
        @else
            <p>Aucun article actuellement</p>
        @endif
        </div>
    </div>
@endsection

