@extends('layouts.app')

@section('title', 'Mijn profiel')

@section('content')
    <div class="flex flex-col justify-center items-center mt-32 mb-20">
        @include('users.partials.header')
        <div class="flex flex-col justify-center">
            @forelse(auth()->user()->activities as $activity)
                <div class="bg-white rounded-lg flex flex-col m-6 mb-4 p-4">
                    <div class="text-left">
                        <span class="wcd-blue">Naam persoon</span>
                    </div>
                    <div class="mt-4 flex w-96">
                        <div>
                            <img src="/images/profile-picture.png" class="rounded-full" height="100" width="100" alt="">
                        </div>
                        <div class="ml-5">
                            <p>{!! $activity->description !!}</p>
                        </div>
                    </div>
                    <div class="text-right text-gray-500 m-4">
                        <span>{{ $activity->created_at->diffForHumans() }}</span>
                    </div>
                </div>
            @empty
                <div class="bg-white rounded-lg m-6 mb-4 p-4">
                    <div class="mt-4 flex w-96">
                        <p>Je feed is op dit moment leeg.</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection
