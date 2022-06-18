@extends('layouts.app', [
    'backgroundClass' => 'wcd-background-yellow'
])

@section('title', 'Vindt vrienden')

@section('content')
    <div class="flex flex-col justify-start mt-16">
        <a href="{{ route('user.profile') }}" class="mt-12 ml-14">
            <img src="/images/icons/back-button.svg" class="h-14 w-14" alt="" />
        </a>
        <div class="bg-white flex flex-col mx-auto items-center rounded-lg m-6 mt-2 p-4 w-3/4">
            <div class="">
                <span class="font-bold">Vind vrienden</span>
            </div>
            <div class="mt-5">
                <input id="search" type="text" name="search" />
            </div>
            <ul id="results" class="mt-4 flex flex-col justify-center list-none">

            </ul>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        let users = @json($users);

        let search = document.getElementById("search");
        let list = document.querySelector("#results");

        search.addEventListener("input", (e) => {
            let value = e.target.value;
            clearList();

            if (value && value.trim().length > 0) {
                 value = value.trim().toLowerCase();

                 setList(users.filter(user => {
                     let name = user.name.toLowerCase();

                     return name.includes(value);
                 }));
            } else {
                clearList();
            }
        });

        function clearList() {
            while (list.firstChild) {
                list.innerHTML = '';
            }
        }

        function setList(results) {
            if (results.length < 1) {
                list.innerHTML = "<li class='flex items-center justify-between rounded-2xl p-5 mb-2 shadow-lg w-full'><div><span class='font-bold'>Er zijn geen gebruikers gevonden op basis van je zoekopdracht.</span></div></li>"

                return;
            }

            for (const person of results) {

                list.innerHTML += "<li class='flex items-center justify-between rounded-2xl p-5 mb-2 shadow-lg w-full'>"+
                        "<div>"+
                            "<img class='rounded-full w-10 h-10' src='"+ person.profile_picture +"' />"+
                        "</div>"+
                        "<div class='ml-2'>"+
                            "<span>"+ person.name +"</span>"+
                        "</div>"+
                        "<div>"+
                            "<a href='/profile/add-friend/"+ person.id +"'><img src='/images/icons/plus.svg' class='w-7 h-7' /></a>"+
                        "</div>"+
                    "</li>";
            }
        }
    </script>
@endpush
