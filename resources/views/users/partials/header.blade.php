<div class="">
    <div class="absolute top-12 right-6">
        <a href="{{ route('user.find-friends') }}">
            <img src="/images/icons/friend-add.svg" class="w-10 h-10" />
        </a>
    </div>
    <div class="absolute top-12 left-6">
        <a href="{{ route('user.settings') }}">
            <img src="/images/icons/settings.svg" class="w-10 h-10" />
        </a>
    </div>
    <a href="{{ route('user.profile') }}">
        <img src="{{ auth()->user()->profile_picture }}"
             class="rounded-full {{ auth()->user()->picture ? null : 'bg-slate-400' }} w-36 h-36"
             alt="profile picture" />

        <div class="flex flex-col items-center justify-center mt-2 text-white">
            <span class="font-semibold text-xl">{{ auth()->user()->name }}</span>
            <span class="text-xs">{{ '@'. str()->snake(auth()->user()->name) }}</span>
        </div>
    </a>
</div>
<div id="scrollable-friends" class="w-full overflow-hidden m-6 px-8">
    <div class="flex gap-2 w-max">
        @foreach(auth()->user()->friends as $friend)
            <div>
                <img class="rounded-full h-20 w-20 border-2 select-none border-sky-500 bg-slate-400 pointer-events-none" src="{{ $friend->profile_picture }}" />
            </div>
        @endforeach
    </div>
</div>
<div class="bg-white rounded-3xl m-3 p-2">
    <a href="{{ route('user.achievements') }}">
        <div class="relative text-center p-3 w-96">
            <div class="absolute left-2 top-0">
                <img src="/images/icons/trophy{{ \Request::route()->getName() == 'user.achievements' ? '-active' : null }}.svg" width="45" height="45" />
            </div>
            <div class="font-bold">
                <span>Achievements</span>
            </div>
        </div>
    </a>
</div>

@push('scripts')
    <script type="text/javascript">
        const slider = document.querySelector('#scrollable-friends');
        let mouseDown = false;
        let startX, scrollLeft;

        let startDragging = function (e) {
            mouseDown = true;
            startX = e.pageX - slider.offsetLeft;
            scrollLeft = slider.scrollLeft;
        };

        let stopDragging = function (event) {
            mouseDown = false;
        };

        slider.addEventListener('mousemove', (e) => {
            e.preventDefault();
            if(!mouseDown) { return; }
            const x = e.pageX - slider.offsetLeft;
            const scroll = x - startX;
            slider.scrollLeft = scrollLeft - scroll;
        });

        // Add the event listeners
        slider.addEventListener('mousedown', startDragging, false);
        slider.addEventListener('mouseup', stopDragging, false);
        slider.addEventListener('mouseleave', stopDragging, false);
    </script>
@endpush
