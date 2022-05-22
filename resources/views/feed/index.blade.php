@extends('layouts.app')

@section('title', 'Mijn feed')

@section('content')
    <div class="container">
        <div class="flex justify-center">
            <div class="rounded-full bg-white px-6 py-1">
                <span class="wcd-pink font-bold">Feed</span>
            </div>
        </div>
        <div class="flex flex-col justify-center mt-5">
            @foreach($activities as $activity)
                <div class="bg-white rounded flex flex-col mb-4 p-2">
                    <div class="text-left">
                        <span class="wcd-blue">Naam persoon</span>
                    </div>
                    <div class="">
                        <p>{!! $activity->description !!}</p>
                    </div>
                    <div class="text-right text-gray-500">
                        <span>{{ $activity->created_at->diffForHumans() }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
