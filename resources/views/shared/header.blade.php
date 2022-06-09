<nav class="navbar navbar-light bg-transparent fixed w-full drop-shadow-md w-max-500 fixed overflow-hidden z-50">
    <div class="flex">
        <div class="ml-5">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto flex items-center">
                <li>
                    <a href="{{ route('user.profile') }}">
                        <img src="{{ auth()->user()->picture ? 'storage/'. auth()->user()->picture : '/images/profile-picture.png' }}"
                                class="m-5 rounded-full {{ auth()->user()->picture ? null : 'bg-slate-400' }} w-20 h-20"
                                alt="profile picture" />
                    </a>
                </li>
                <li class="flex flex-col text-white font-bold">
                    <span>{{ auth()->user()->name }}</span>
                    <span class="text-xs">{{ '@'. str()->snake(auth()->user()->name) }}</span>
                </li>
            </ul>
        </div>
        <div class="ml-auto">
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
