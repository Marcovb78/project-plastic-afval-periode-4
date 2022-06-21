@extends('layouts.app')

@section('title', 'Evenementen map')

@section('content')
    <div>
        <div class="absolute top-1 right-1 z-20">
            <button class="px-4 py-2 rounded-xl wcd-background-yellow text-sm flex items-center" type="button" data-modal-toggle="create-event-modal">
                <img src="/images/icons/pin.svg" class="w-5 h-5 mr-2">Nieuw event
            </button>
        </div>
        <div id="map" class="h-screen z-10"></div>
    </div>
@endsection

@push('modals')
    <div id="create-event-modal" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
        <!-- A basic modal dialog with title, body and one button to close -->
        <div class="h-auto p-6 mx-2 text-left bg-white rounded-2xl shadow-xl md:max-w-md">
            <div class="mt-3">
                <h3 class="text-xl ml-3 font-bold leading-6 text-gray-900 border-bottom-2 border-gray-400">
                    Maak een evenement
                </h3>
                <div class="mt-2">
                    <p class="text-sm leading-5 text-gray-500">
                        <form id="eventForm" action="{{ route('events.create') }}" method="post">
                            @csrf

                            <div class="flex flex-col justify-center gap-5 m-3 mt-6">

                                <div class="">
                                    <div class="border-b @error('title') border-red-400 @else border-gray-400 @enderror">
                                        <input class="border-transparent pl-0 pt-0 focus:border-transparent focus:ring-0" id="title" type="text" placeholder="Titel" name="title" required />
                                    </div>
                                    @error('title')
                                        <span class="text-red-400 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="">
                                    <div class="border-b @error('description') border-red-400 @else border-gray-400 @enderror">
                                        <input class="border-transparent pl-0 pt-0 focus:border-transparent focus:ring-0" id="description" type="text" placeholder="Beschrijving" name="description" required />
                                    </div>
                                    @error('description')
                                        <span class="text-red-400 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="">
                                    <div class="border-b @error('city') border-red-400 @else border-gray-400 @enderror">
                                        <input class="border-transparent pl-0 pt-0 focus:border-transparent focus:ring-0" id="city" type="text" placeholder="Plaats" name="city" required />
                                    </div>
                                    @error('city')
                                        <span class="text-red-400 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="">
                                    <div class="border-b @error('spots') border-red-400 @else border-gray-400 @enderror">
                                        <input class="border-transparent pl-0 pt-0 focus:border-transparent focus:ring-0" id="spots" type="number" placeholder="Max aantal deelnemers" name="spots" required />
                                    </div>
                                    @error('spots')
                                        <span class="text-red-400 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div>
                                    <h2 class="font-bold">Datum en tijd</h2>
                                </div>

                                <div class="">
                                    <div class="border-b @error('from_date') border-red-400 @else border-gray-400 @enderror">
                                        <input class="flatpickr border-transparent pl-0 pt-0 focus:border-transparent focus:ring-0" type="text" name="from_date" placeholder="Start datum + tijd" readonly required />
                                    </div>
                                    @error('from_date')
                                        <span class="text-red-400 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="">
                                    <div class="border-b @error('to_date') border-red-400 @else border-gray-400 @enderror">
                                        <input class="flatpickr border-transparent pl-0 pt-0 focus:border-transparent focus:ring-0" type="text" name="to_date" placeholder="Eind datum + tijd" readonly required />
                                    </div>
                                    @error('to_date')
                                        <span class="text-red-400 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>
                        </form>
                    </p>
                </div>
            </div>
            <!-- One big close button.  --->
            <div class="mt-5 sm:mt-6">
                <span class="flex w-full justify-between rounded-md shadow-sm">
                    <button data-modal-toggle="create-event-modal" class="inline-flex justify-center px-4 py-1 text-gray-400 rounded border-2 border-gray-400 text-sm">
                        Annuleren
                    </button>
                    <button type="submit" form="eventForm" class="inline-flex justify-center px-4 py-1 text-black bg-blue-500 rounded text-sm">
                        Aanmaken!
                    </button>
                </span>
            </div>
        </div>
    </div>
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

        flatpickr('.flatpickr', {
            enableTime: true,
            time_24hr: true,
        })
    </script>
    <script type="text/javascript">
        let events = @json($events);

        var map = L.map('map').setView([52.2129919, 5.2793703], 7);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright" target="_blank">OpenStreetMap</a> contributors'
        }).addTo(map);

        events.forEach((event) => {
            let markerIcon = L.icon({
                iconUrl: (event.has_joined
                    ? '/images/icons/pin-joined.svg'
                    : (event.owner_is_friend
                        ? '/images/icons/pin-friends.svg'
                        : '/images/icons/pin-available.svg')),
                iconSize: [32, 32],
                popupAnchor: [0, -10],
            });

            L.marker([event.longitude, event.latitude], {
                icon: markerIcon
            }).addTo(map)
                .bindPopup(
                    "<div class='flex flex-col gap-2'>"+
                        "<div class='font-bold'>"+
                            "<span>"+ moment(event.from_date).calendar() +"</span>"+
                            "<span class='wcd-blue ml-1'>"+ moment(event.from_date).format('HH:mm') +" - "+ moment(event.to_date).format('HH:mm') +"</span>"+
                        "</div>"+
                        "<div class='font-bold text-xl'>"+ event.title +"</div>"+
                        "<div>"+ event.description +"</div>"+
                        (! event.has_joined
                            ? "<div class='flex justify-end'>"+
                                "<a class='mt-1' href='/events/"+ event.id +"/join'>"+
                                    "<div class='rounded-3xl px-4 py-2 flex flex-row items-center gap-4 bg-yellow-300'>"+
                                        "<div>"+
                                            "<img class='h-8 w-8' src='/images/icons/calender.svg' />"+
                                        "</div>"+
                                        "<div class='font-bold'>"+
                                            "<span class='text-sm text-black'>Join</span>"+
                                        "</div>"+
                                    "</div>"+
                                "</a>"
                            : "")+
                        "</div>"+
                    "</div>"
                );
        })

        document.querySelector('main').classList.remove('py-4');
        document.querySelector('body').classList.add('overflow-y-hidden')
    </script>
@endpush
