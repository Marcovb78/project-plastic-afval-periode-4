@extends('layouts.app')

@section('title', 'Mijn feed')

@section('content')
    <div class="container mt-32">
        <div class="flex justify-center">
            <div class="rounded-full bg-white px-6 py-1">
                <span class="wcd-pink font-bold">Feed</span>
            </div>
        </div>
        <div class="flex flex-col justify-center">
            @foreach($activities as $activity)
                <div class="bg-white rounded-lg flex flex-col m-10 mb-0 p-4">
                    <div class="text-left">
                        <span class="wcd-blue">Naam persoon</span>
                    </div>
                    <div class="mt-4 flex w-96">
                        <div>
                            <img src="/images/profile-picture.jpg" class="rounded-full" height="100" width="100" alt="">
                        </div>
                        <div class="ml-5">
                            <p>{!! $activity->description !!}</p>
                        </div>
                        <div>
                            <img src="/images/icons/trophy-active.svg" height="90" width="90" alt="">
                        </div>
                    </div>
                    <div class="text-right text-gray-500 m-4">
                        <span>{{ $activity->created_at->diffForHumans() }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
