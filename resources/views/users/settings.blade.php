@extends('layouts.app', [
    'backgroundClass' => 'wcd-background-yellow'
])

@section('title', 'Instellingen')

@section('content')
    <div class="mt-16 mb-20 mx-12 text-white">
        <h2 class="text-4xl font-bold text-white tracking-wider ml-4">Instellingen</h2>
        <div class="flex flex-col justify-start mt-16">
            <div class="">
                <h2 class="text-xl text-white tracking-wider">Account</h2>
            </div>
            <div class="flex items-center mt-5">
                <div class="">
                    <img class="rounded-full w-24 h-24" src="{{ auth()->user()->profile_picture }}" alt="" />
                </div>
                <div class="flex-auto flex flex-col justify-start text-white ml-5">
                    <span class="text-2xl">{{ auth()->user()->name }}</span>
                    <span class="text-sm">{{ '@'. str()->snake(auth()->user()->name) }}</span>
                </div>
                <div class="">
                    <a href="#" data-modal-toggle="edit-settings" class="h-12 w-12 bg-gray-500 rounded-2xl flex items-center justify-center">
                        <img src="/images/icons/chevron-right-white.svg" class="h-8 w-8" />
                    </a>
                </div>
            </div>
        </div>
        <div class="flex flex-col justify-start mt-16">
            <div class="">
                <h2 class="text-xl text-white tracking-wider">Algemeen</h2>
            </div>
            <div class="flex items-center mt-5">
                <div class="">
                    <img class="rounded-full h-8 w-8" src="/images/icons/globe-white.svg" />
                </div>
                <div class="flex-auto ml-5">
                    <span class="text-xl">Taal</span>
                </div>
                <div class="flex-auto">
                    <span class="text-xl">Nederlands</span>
                </div>
                <div class="">
                    <div class="h-12 w-12 bg-gray-500 rounded-2xl flex items-center justify-center">
                        <img src="/images/icons/chevron-right-white.svg" class="h-8 w-8" />
                    </div>
                </div>
            </div>
            <div class="flex items-center mt-5">
                <div class="">
                    <img class="rounded-full h-8 w-8" src="/images/icons/bell-white.svg" />
                </div>
                <div class="flex-auto ml-5">
                    <span class="text-xl">Notificaties</span>
                </div>
                <div class="">
                    <div class="h-12 w-12 bg-gray-500 rounded-2xl flex items-center justify-center">
                        <img src="/images/icons/chevron-right-white.svg" class="h-8 w-8" />
                    </div>
                </div>
            </div>
            <div class="flex items-center mt-5">
                <div class="">
                    <img class="rounded-full h-8 w-8" src="/images/icons/question-circle-white.svg" />
                </div>
                <div class="flex-auto ml-5">
                    <span class="text-xl">Help</span>
                </div>
                <div class="">
                    <div class="h-12 w-12 bg-gray-500 rounded-2xl flex items-center justify-center">
                        <img src="/images/icons/chevron-right-white.svg" class="h-8 w-8" />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('modals')
    @include('users.partials.modals.settings')
@endpush

@push('scripts')
    <script>
        let elements = document.querySelectorAll('[data-modal-toggle]')

        for (let i = 0; i < elements.length; i++) {
            elements[i].addEventListener('click', function () {
                setTimeout(function () {
                    let backgroundElement = document.querySelector('[modal-backdrop]')

                    if (backgroundElement) {
                        backgroundElement.classList.remove('bg-gray-900')
                        backgroundElement.classList.remove('z-40')
                        backgroundElement.classList.add('bg-white')
                        backgroundElement.classList.add('z-30')
                    }
                })
            })
        }
    </script>
@endpush
