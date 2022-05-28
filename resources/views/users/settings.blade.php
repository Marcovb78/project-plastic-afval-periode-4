@extends('layouts.app')

@section('title', 'Instellingen')

@section('content')
    <div class="flex flex-col justify-center items-center mt-32 mb-20">
        @include('users.partials.header')
        <div class="bg-white rounded-lg flex flex-col m-6 mb-4 p-4">
            <div class="flex flex-col w-96">
                <div class="flex items-center ml-1 mb-1">
                    <a href="#" class="flex items-center" data-modal-toggle="edit-picture">
                        <img src="/images/icons/pen.svg" width="46" height="46" alt="pen icon" />
                        <span class="font-bold ml-2">Bewerk foto & naam</span>
                    </a>
                </div>
                <div class="flex items-center">
                    <a href="#" class="flex items-center mt-2" data-modal-toggle="edit-settings">
                        <img src="/images/icons/notebook.svg" width="50" height="50" alt="notebook icon" />
                        <span class="font-bold ml-2">Gegevens aanpassen</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        let elements = document.querySelectorAll('[data-modal-toggle]')

        for (let i = 0; i < elements.length; i++) {
            elements[i].addEventListener('click', function () {
                setTimeout(function () {
                    let backgroundElement = document.querySelector('[modal-backdrop]')

                    backgroundElement.classList.remove('bg-gray-900')
                    backgroundElement.classList.remove('z-40')
                    backgroundElement.classList.add('bg-white')
                    backgroundElement.classList.add('z-30')
                })
            })
        }
    </script>
@endpush

@push('modals')
    @include('users.partials.modals.settings')
@endpush
