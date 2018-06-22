@extends('layouts.app')

@section('content')
    @if(count($articles))
        <div class="card-columns">
            @foreach ($articles as $article)

                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" data-src="{{ $article->images[0]->src }}" alt="{{ $article->images[0]->alt }}" style="height: 180px; width: 100%; display: block;" src="{{ $article->images[0]->src }}" data-holder-rendered="true">
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->designation }}</h5>
                        <p class="card-text">{{ $article->description }}</p>
                        <p class="card-text">{{ $article->type->designation }}</p>
                        @foreach($article->matters()->get() as $matter)
                            <p class="card-text"><small class="text-muted">{{ $matter->designation }}</small></p>
                        @endforeach
                        <a href="{{ route("articles.show",['id' => $article->id]) }}" class="btn btn-primary">En savoir plus</a>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection

