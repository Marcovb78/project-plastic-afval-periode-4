@extends('layouts.app', [
    'backgroundClass' => 'wcd-background-pink'
])

@section('title', $article->title)

@section('content')
<div class="container mt-20">
    <div class="flex flex-col justify-center pb-5 px-10 pt-10">
        <div>
            <h2 class="text-2xl text-white font-bold text-center">{{ $article->title }}</h2>
        </div>
        <div class="mt-3">
            <span>{!! $article->content !!}</span>
        </div>
    </div>
</div>
@endsection
