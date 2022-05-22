@extends('layouts.app')

@section('title', 'Evenementen map')

@section('content')
    <div class="">
        <div id="map"></div>
    </div>
@endsection

@push('scripts')
    <!--
     The `defer` attribute causes the callback to execute after the full HTML
     document has been parsed. For non-blocking uses, avoiding race conditions,
     and consistent behavior across browsers, consider loading using Promises
     with https://www.npmjs.com/package/@googlemaps/js-api-loader.
    -->
    <script src="https://maps.googleapis.com/maps/api/js?key={{ config('app.google_api_key') }}&callback=initMap&v=weekly" defer></script>

    <script>
        let map;

        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                center: { lat: -34.397, lng: 150.644 },
                zoom: 8,
            });
        }

        window.initMap = initMap;
    </script>
@endpush
