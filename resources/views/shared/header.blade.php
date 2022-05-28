<nav class="navbar navbar-light bg-transparent fixed w-full drop-shadow-md w-max-500 fixed overflow-hidden">
    <div class="flex">
        <a class="navbar-brand m-4" href="{{ route('feed.show') }}">
            <img src="/images/wcd-logo.png" width="110" alt="World CleanUp Day Logo">
        </a>

        <div class="ml-auto">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li>
                        <a href="{{ route('user.profile') }}">
                            <img src="{{ auth()->user()->picture ? 'storage/'. auth()->user()->picture : '/images/profile-picture.png' }}"
                                 class="m-5 rounded-full {{ auth()->user()->picture ? null : 'bg-slate-400' }} w-20 h-20"
                                 alt="profile picture" />
                        </a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
