@extends('layouts.app', [
    'backgroundClass' => 'wcd-background-yellow'
])

@section('title', 'Mijn profiel')

@section('content')
    <div class="flex flex-col justify-center items-center mt-16">
        @include('users.partials.header')
        <div class="flex flex-col justify-center">
            <div id="calendar" class="mt-2"></div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        let eventDates = @json(auth()->user()->events->pluck('from_date')->toArray());
        let formattedDates = [];

        eventDates.forEach((date) => {
            let formattedDate = new Date(date);
            var DD = String(formattedDate.getDate()).padStart(2, '0');
            var MM = String(formattedDate.getMonth() + 1).padStart(2, '0');
            var YYYY = formattedDate.getFullYear();

            formattedDates.push(YYYY +'-'+ MM +'-'+ DD);
        })

        const calendar = new VanillaCalendar({
            HTMLElement: document.querySelector('#calendar'),
            date: {
                min: '2000-01-01',
                max: '2030-12-31',
                today: new Date(),
            },
            settings: {
                selected: {
                    dates: formattedDates,
                },
            },
            actions: {
                clickDay(e) {
                    throw new Error('Not happening mate.');
                },
            },
        });

        calendar.init();
    </script>
@endpush
