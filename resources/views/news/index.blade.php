@extends('layouts.app', [
    'backgroundClass' => 'wcd-background-pink'
])

@section('title', 'Nieuws')

@section('content')
<div class="container mt-24 article-scroll">
    <div class="scrollable">
        <div class="flex flex-col justify-center article">
            @foreach($articles as $article)
                <a href="{{ route('news.show', [ 'article' => $article->id, 'slug' => str()->snake($article->title) ]) }}"
                   class="rounded-3xl flex flex-col m-10 mb-0 {{ $loop->last ? 'mb-96' : null }} relative h-36 shadow-inner object-fit bg-center bg-cover"
                   style="background-image: url('{{ $article->image }}'); box-shadow: inset 0px -44px 60px 0px rgb(0 0 0);">
                    <div class="absolute flex flex-col px-4 py-4 bottom-0 text-white">
                        <span>{{ $article->title }}</span>
                        <span class="text-xs mt-1">Lees meer...</span>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>
@endsection
