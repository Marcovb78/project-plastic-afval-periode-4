@extends('layouts.app', [
    'backgroundClass' => 'wcd-background-pink'
])

@section('title', $article->title)

@section('content')
<div class="container mt-28">
    <div class="flex flex-col justify-center p-3 px-10 feed-scroll">
        <div class="scrollable">
            <div>
                <h2 class="text-2xl text-white font-bold text-center">{{ $article->title }}</h2>
            </div>
            <div class="mt-3 p-6 bg-white rounded-lg">
                <span>{!! $article->content !!}</span>
            </div>
        </div>
    </div>
</div>
@endsection
