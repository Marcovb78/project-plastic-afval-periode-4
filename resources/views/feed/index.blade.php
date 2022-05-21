@extends('layouts.app')

@section('title', 'Test')

@push('styles')
    <style>
        body {
            background-image: '';
        }
    </style>
@endpush

@section('content')
    <div class="container">
        <div class="grid justify-center">
            <div class="max-w-sm rounded overflow-hidden shadow-lg">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">{{ __('Dashboard')}}</div>
                    <p class="text-gray-700 text-base">
                        {{ __('You are logged in!') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
