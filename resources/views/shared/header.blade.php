<nav class="navbar navbar-light bg-transparent fixed w-full drop-shadow-md w-max-500 fixed overflow-hidden z-50">
    <div class="flex">
        <div class="ml-5">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto flex items-center">
                <li>
                    <a href="{{ route('user.profile') }}">
                        <img src="{{ auth()->user()->profile_picture }}"
                                class="m-5 rounded-full {{ auth()->user()->picture ? null : 'bg-slate-400' }} w-20 h-20"
                                alt="profile picture" />
                    </a>
                </li>
                <li class="flex flex-col text-white">
                    <span class="font-semibold">{{ auth()->user()->name }}</span>
                    <span class="text-xs">{{ '@'. str()->snake(auth()->user()->name) }}</span>
                </li>
            </ul>
        </div>
    </div>
</nav>
