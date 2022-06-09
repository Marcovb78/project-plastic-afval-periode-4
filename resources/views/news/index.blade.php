@extends('layouts.app', [
    'backgroundClass' => 'wcd-background-pink' 
])

@section('title', 'Nieuws')

@section('content')
<div class="container mt-20">
    <div class="flex flex-col justify-center">
        @foreach($articles as $article)
            <a href="{{ route('news.show', [ 'article' => $article->id, 'slug' => str()->snake($article->title) ]) }}" class="rounded-3xl flex flex-col m-10 mb-0 relative h-36 shadow-inner object-fit bg-center bg-cover" 
                style="background-image: url('{{ $article->image }}'); box-shadow: inset 0px -44px 60px 0px rgb(0 0 0);">
                <div class="absolute flex flex-col px-4 py-3 bottom-0 text-white font-bold">
                    <span>{{ $article->title }}</span>
                    <span class="text-xs">Lees meer...</span>
                </div>
            </a>
        @endforeach
    </div>
</div>
@endsection
