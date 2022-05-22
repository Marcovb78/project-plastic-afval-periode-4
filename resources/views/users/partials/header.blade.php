<div>
    <img src="/images/profile-picture.jpg" class="rounded-full" width="200" height="200" alt="Profiel foto" />
</div>
<div class="bg-white rounded-lg flex flex-col m-6 mb-4 p-4">
    <div class="text-center">
        <span class="font-bold">{{ auth()->user()->name }}</span>
    </div>
    <div class="mt-4 flex w-96">
        <div>
            <a href="{{ route('user.profile') }}">
                <img src="/images/icons/friend{{ \Request::route()->getName() == 'user.profile' ? '-active' : null }}.svg" width="55" height="55" />
            </a>
        </div>
        <div>
            <img src="/images/icons/bell.svg" width="55" height="55" />
        </div>
        <div>
            <img src="/images/icons/trophy.svg" width="55" height="55" />
        </div>
        <div>
            <a href="{{ route('user.settings') }}">
                <img src="/images/icons/settings{{ \Request::route()->getName() == 'user.settings' ? '-active' : null }}.svg" width="55" height="55" />
            </a>
        </div>
    </div>
</div>
