@extends('layouts.app')

@section('title', 'Evenementen map')

@section('content')
    <div x-data="{ open: false }">
        <!-- <div class="absolute top-1 right-1 z-20">
            <button class="px-4 py-2 rounded-xl wcd-background-yellow text-sm flex items-center" type="button" name="button" @click="open = !open"><img src="/images/icons/pin.svg" class="w-5 h-5 mr-2">Nieuw event</button>
        </div> -->
        <!-- Dialog (full screen) -->
        {{-- <div class="absolute top-0 left-0 flex items-center justify-center w-full h-full z-20" style="background-color: rgba(0,0,0,.5);" x-show="open"  >
            <!-- A basic modal dialog with title, body and one button to close -->
            <div class="h-auto p-3 mx-2 text-left bg-white rounded shadow-xl md:max-w-md" @click.away="open = false">
                <div class="mt-3">
                    <h3 class="text-lg font-medium leading-6 text-gray-900 border-bottom-2 border-gray-400">
                        Maak een evenement!
                    </h3>
                    <div class="mt-2">
                        <p class="text-sm leading-5 text-gray-500">
                            <form id="eventForm" action="{{ route('events.create') }}" method="post">
                                @csrf

                                <div class="grid grid-flow-col auto-cols-auto">

                                    <div class="col-span-12">
                                        <label class="block text-gray-700 font-bold mb-2 text-left" for="title">Titel</label>
                                        <input class="shadow appearance-none border rounded py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline" id="title" type="text" placeholder="Titel van het evenement" name="title" />
                                    </div>

                                </div>
                            </form>
                        </p>
                    </div>
                </div>
                <!-- One big close button.  --->
                <div class="mt-5 sm:mt-6">
                    <span class="flex w-full justify-between rounded-md shadow-sm">
                        <button @click="open = false" class="inline-flex justify-center px-3 py-2 text-white bg-blue-500 rounded hover:bg-blue-700 text-sm">
                            Annuleren
                        </button>
                        <button @click="open = false" type="submit" form="eventForm" class="inline-flex justify-center px-3 py-2 text-white bg-blue-500 rounded hover:bg-blue-700 text-sm">
                            Aanmaken!
                        </button>
                    </span>
                </div>
            </div>
        </div> --}}
        <div id="map" class="h-screen z-10"></div>
    </div>
@endsection

@push('scripts')
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
