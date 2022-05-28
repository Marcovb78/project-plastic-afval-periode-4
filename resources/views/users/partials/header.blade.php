<div>
    <img src="{{ auth()->user()->picture ? 'storage/'. auth()->user()->picture : '/images/profile-picture.png' }}"
         class="rounded-full {{ auth()->user()->picture ? null : 'bg-slate-400' }} w-44 h-44"
         alt="profile picture" />
</div>
<div class="bg-white rounded-lg flex flex-col m-6 mb-4 p-4">
    <div class="text-center">
        <span class="font-bold text-xl">{{ auth()->user()->name }}</span>
    </div>
    <div class="mt-4 flex justify-center w-96">
        <div class="flex mr-7">
            <a href="{{ route('user.profile') }}">
                <img src="/images/icons/friend{{ \Request::route()->getName() == 'user.profile' ? '-active' : null }}.svg" width="55" height="55" />
            </a>
        </div>
        <div>
            <div class="flex mr-7">
                <img src="/images/icons/calender.svg" width="55" height="55" />
            </div>
        </div>
        <div>
            <div class="flex mr-7">
                <a href="{{ route('user.achievements') }}">
                    <img src="/images/icons/trophy{{ \Request::route()->getName() == 'user.achievements' ? '-active' : null }}.svg" width="55" height="55" />
                </a>
            </div>
        </div>
        <div>
            <div class="flex mr-0">
                <a href="{{ route('user.settings') }}">
                    <img src="/images/icons/settings{{ \Request::route()->getName() == 'user.settings' ? '-active' : null }}.svg" width="55" height="55" />
                </a>
            </div>
        </div>
    </div>
</div>
