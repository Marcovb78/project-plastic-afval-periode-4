@extends('layouts.app')

@section('title', 'Instellingen')

@section('content')
    <div class="flex flex-col justify-center items-center mt-32 mb-20">
        @include('users.partials.header')
        <div class="bg-white rounded-lg flex flex-col m-6 mb-4 p-4">
            <div class="flex flex-col w-96">
                <div class="flex items-center mb-1">
                    <img src="/images/icons/friend.svg" width="55" height="55" alt="friend icon" />
                    <span class="font-bold ml-2">Log in op ander account</span>
                </div>
                <div class="flex items-center mb-1">
                    <img src="/images/icons/bell.svg" width="55" height="55" alt="bell icon" />
                    <span class="font-bold ml-2">Beheer notificaties</span>
                </div>
                <div class="flex items-center ml-1 mb-1">
                    <img src="/images/icons/pen.svg" width="46" height="46" alt="pen icon" />
                    <span class="font-bold ml-2">Bewerk foto & naam</span>
                </div>
                <div class="flex items-center">
                    <img src="/images/icons/notebook.svg" width="50" height="50" alt="notebook icon" />
                    <span class="font-bold ml-2">Gegevens aanpassen</span>
                </div>
            </div>
        </div>
    </div>
@endsection
