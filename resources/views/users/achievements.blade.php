@extends('layouts.app', [
    'backgroundClass' => 'wcd-background-yellow'
])

@section('title', 'Prestaties')

@section('content')
    <div class="flex flex-col justify-center items-center mt-16 mb-20">
        @include('users.partials.header')
        <div class="flex flex-col justify-center">
            <div class="bg-white rounded-lg m-10 mt-4 p-4 px-10 feed-scroll ">
                <div class="scrollable">
                    @forelse(auth()->user()->achievements as $achievement)
                        <div class="flex justify-between">
                            <div class="flex flex-col">
                                <div class="text-left">
                                    <span class="font-bold text-xl">
                                        <span class="wcd-pink">{{ $achievement->name }}</span> -
                                    </span>
                                </div>
                                <div class="mt-4 flex">
                                    <p class="text-gray-400 font-bold">{{ $achievement->description }}</p>
                                </div>
                            </div>
                            <img src="/images/icons/trophy{{ $achievement->pivot->completed ? '-completed' : null }}.svg" width="50" height="50" alt="Trophy" />
                        </div>
                        @if(!$loop->last)
                            <hr class="my-4" />
                        @endif
                    @empty
                        <div class="bg-white rounded-lg m-6 mb-4 p-4">
                            <div class="mt-4 flex w-96">
                                <p>Er zijn geen prestaties beschikbaar.</p>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
