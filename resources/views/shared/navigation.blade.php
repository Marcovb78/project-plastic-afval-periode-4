<nav class="fixed bottom-0 left-0 right-0 flex justify-center drop-shadow-lg mx-auto" style="max-width: 500px;">
    <div class="rounded-t-3xl w-full" style="background-color: white;">
        <div class="p-4">
            <div class="flex flex-column justify-center items-center relative">
                <div class="mx-10 drop-shadow-lg {{ \Request::route()->getName() == 'events.map' ? 'relative bottom-10' : null }}">
                    <a href="{{ route('events.map') }}">
                        <div class="rounded-full bg-white p-3">
                            <img src="/images/icons/pin-yellow.svg" width="40" height="40" alt="">
                        </div>
                    </a>
                </div>
                <div class="mx-10 drop-shadow-lg {{ \Request::route()->getName() == 'feed.show' ? 'relative bottom-10' : null }}">
                    <a href="{{ route('feed.show') }}">
                        <div class="rounded-full bg-white p-3">
                            <img src="/images/icons/house-active.svg" width="40" height="40" alt="">
                        </div>
                    </a>
                </div>
                <div class="mx-10 drop-shadow-lg {{ \Request::route()->getName() == 'news.index' ? 'relative bottom-10' : null }}">
                    <a href="{{ route('feed.show') }}">
                        <div class="rounded-full bg-white p-3">
                            <img src="/images/icons/news-active.svg" width="40" height="40" alt="">
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>
