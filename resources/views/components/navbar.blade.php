<nav class="navbar navbar-expand-lg navbar-light p-0 fixed-top">
    <a href="{{ route('homepage') }}">
        <img class="ms-4 border border-2 border-dark rounded-circle shadow-lg logoWidth"
            src="\storage\images\Collectorz_test.png" alt="">
    </a>

    <button type="button" class="navbar-toggler ms-auto me-2" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto d-flex align-items-end align-items-lg-center pb-1">
            <div class="d-flex flex-row my-1 align-items-center justify-content-center">
                <form action="{{ route('announcements.search') }}" method="GET" class="d-flex me-0" id="formSearch">
                    <div class="searchContainer pe-0">
                        <div class="search-box">
                            <input type="text" class="search-input" name="searched"
                                placeholder="{{ __('ui.cerca') }}..">
                            <button class="search-button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                    viewBox="0 0 26 26">
                                    <path fill="currentColor"
                                        d="M10 .188A9.812 9.812 0 0 0 .187 10A9.812 9.812 0 0 0 10 19.813c2.29 0 4.393-.811 6.063-2.125l.875.875a1.845 1.845 0 0 0 .343 2.156l4.594 4.625c.713.714 1.88.714 2.594 0l.875-.875a1.84 1.84 0 0 0 0-2.594l-4.625-4.594a1.824 1.824 0 0 0-2.157-.312l-.875-.875A9.812 9.812 0 0 0 10 .188M10 2a8 8 0 1 1 0 16a8 8 0 0 1 0-16M4.937 7.469a5.446 5.446 0 0 0-.812 2.875a5.46 5.46 0 0 0 5.469 5.469a5.516 5.516 0 0 0 3.156-1a7.166 7.166 0 0 1-.75.03a7.045 7.045 0 0 1-7.063-7.062c0-.104-.005-.208 0-.312" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="languages d-flex flex-row flex-lg-column ms-lg-3 flex-xl-row ms-xl-3 my-1 justify-content-end">
                <span class="me-1">
                    <x-locale lang='es' nation='es' />
                </span>
                <span class="me-1">
                    <x-locale lang='it' nation='it' />
                </span>
                <span class="me-md-1">
                    <x-locale lang='en' nation='gb' />
                </span>
            </div>
            <div class="d-flex flex-row-reverse flex-lg-row align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="-5 0 21 23">
                    <path fill="#d9e8ca" d="M8 1.4L6 2.7V1H4v3L0 6.6l.6.8L8 2.6l7.4 4.8l.6-.8z" />
                    <path fill="#d9e8ca" d="M8 4L2 8v7h5v-3h2v3h5V8z" />
                </svg>
                <a href="{{ route('homepage') }}" class="nav-item me-0 me-lg-4 nav-link py-0">Home</a>
            </div>
            <div class="d-flex flex-row-reverse flex-lg-row align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="-2 0 24 27">
                    <path fill="#e0cae8"
                        d="M13.5 4A1.5 1.5 0 0 0 12 5.5A1.5 1.5 0 0 0 13.5 7A1.5 1.5 0 0 0 15 5.5A1.5 1.5 0 0 0 13.5 4m-.36 4.77c-1.19.1-4.44 2.69-4.44 2.69c-.2.15-.14.14.02.42c.16.27.14.29.33.16c.2-.13.53-.34 1.08-.68c2.12-1.36.34 1.78-.57 7.07c-.36 2.62 2 1.27 2.61.87c.6-.39 2.21-1.5 2.37-1.61c.22-.15.06-.27-.11-.52c-.12-.17-.24-.05-.24-.05c-.65.43-1.84 1.33-2 .76c-.19-.57 1.03-4.48 1.7-7.17c.11-.64.41-2.04-.75-1.94" />
                </svg>
                <a href="{{route('about')}}" class="nav-item me-0 me-lg-4 nav-link">{{ __('ui.about') }}</a>
            </div>
            <div class="d-flex flex-row-reverse flex-lg-row align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 100 900 1100">
                    <rect width="1024" height="1024" fill="none" />
                    <path fill="#e8d8ca" fill-rule="evenodd"
                        d="M464 144c8.837 0 16 7.163 16 16v304c0 8.836-7.163 16-16 16H160c-8.837 0-16-7.164-16-16V160c0-8.837 7.163-16 16-16zm-52 68H212v200h200zm493.333 87.686c6.248 6.248 6.248 16.379 0 22.627l-181.02 181.02c-6.248 6.248-16.378 6.248-22.627 0l-181.019-181.02c-6.248-6.248-6.248-16.379 0-22.627l181.02-181.02c6.248-6.248 16.378-6.248 22.627 0zm-84.853 11.313L713 203.52L605.52 311L713 418.48zM464 544c8.837 0 16 7.164 16 16v304c0 8.837-7.163 16-16 16H160c-8.837 0-16-7.163-16-16V560c0-8.836 7.163-16 16-16zm-52 68H212v200h200zm452-68c8.837 0 16 7.164 16 16v304c0 8.837-7.163 16-16 16H560c-8.837 0-16-7.163-16-16V560c0-8.836 7.163-16 16-16zm-52 68H612v200h200z" />
                </svg>
                <a href="{{ route('announcements.index') }}"
                    class="nav-item me-0 me-lg-4 nav-link ">{{ __('ui.annunci') }}</a>
            </div>
            @auth
                <div class="d-flex flex-row-reverse flex-lg-row align-items-center">
                    @if (Auth::user()->is_revisor)
                        <a href="{{ route('revisor.index') }}" type="button"
                            class="icon-button nav-item ms-0 me-0 me-lg-4 nav-link">
                            <span class="material-icons">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M19 6h-3V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v1H5a3 3 0 0 0-3 3v9a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3V9a3 3 0 0 0-3-3m-9-1h4v1h-4Zm10 13a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-5.61L8.68 14A1.19 1.19 0 0 0 9 14h6a1.19 1.19 0 0 0 .32-.05L20 12.39Zm0-7.72L14.84 12H9.16L4 10.28V9a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1Z" />
                                </svg>
                            </span>
                            @php
                                $nullAnnouncements = 0;

                                foreach (Auth::user()->announcements as $announcement) {
                                    if ($announcement->is_accepted === null) {
                                        $nullAnnouncements += 1;
                                    }
                                }

                            @endphp

                            <span class="icon-button__badge">{{ $announcementsCounter - $nullAnnouncements }}</span>
                        </a>
                    @endif
                </div>
            @endauth
            <div class="d-flex flex-row-reverse flex-lg-row align-items-center">
                <div class="dropdown">
                    <button class="dropdown-toggle text-end pe-0 pe-lg-1 d-flex flex-row-reverse flex-lg-row"
                        type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="2 0 37 40">
                            <rect width="32" height="32" fill="none" />
                            <path fill="#180c02"
                                d="M20 26h6v2h-6zm0-8h8v2h-8zm0-8h10v2H20zm-5-6h2v24h-2zm-4.414-.041L7 7.249L3.412 3.958L2 5.373L7 10l5-4.627z" />
                        </svg> <span class="me-1 categories mb-1 mb-lg-0">{{ __('ui.categories') }}</span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                        @foreach ($categories as $category)
                            <li>
                                <button class="dropdown-item" type="button">
                                    <a href="{{ route('categories.show', ['category' => $category]) }}"
                                        class="dropdown-item category">{{ $category->name }}
                                    </a>
                                </button>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @guest
                <a href="{{ route('login') }}" class="btn btn-outline-warning me-0 me-lg-2 mb-1 mb-lg-0">{{__('ui.loginRegister')}}</a>
            @endguest
            @auth
                @if (!Auth::user()->is_revisor)
                    <div class="d-flex flex-row justify-content-center align-items-center work ms-lg-2 me-lg-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24">
                            <path fill="currentColor" fill-rule="evenodd"
                                d="M17 7a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3H6a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h12a3 3 0 0 0 3-3v-8a3 3 0 0 0-3-3zm-3-1h-4a1 1 0 0 0-1 1h6a1 1 0 0 0-1-1M6 9h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1v-8a1 1 0 0 1 1-1"
                                clip-rule="evenodd" />
                        </svg>
                        <a href="{{ route('workWithUs.revisor') }}"
                            class="nav-item me-2 nav-link text-white">{{ __('ui.lavora') }}</a>
                    </div>
                @endif
                <div class="menu-toggle d-none"></div>
                <div class="profile ms-4 me-md-4">
                    <div class="img-box">
                        <img src="{{ Auth::user()->user_photo ?? '\storage\images\user.gif' }}"
                            class="img-fluid animated pulse infinite" alt="some user image">
                    </div>
                </div>
                <div class="menu">
                    <ul class="ps-0">
                        <li class="mt-2 ms-2">{{ __('ui.saluto') }}, <strong>{{ \Auth::user()->name }}!</strong></li>
                        <li>
                            <a href="{{ route('auth.profile') }}" class="ps-3 py-2"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 14 14"><path fill="currentColor" fill-rule="evenodd" d="M1.573 1.573A.25.25 0 0 1 1.75 1.5h1.5a.75.75 0 0 0 0-1.5h-1.5A1.75 1.75 0 0 0 0 1.75v1.5a.75.75 0 0 0 1.5 0v-1.5a.25.25 0 0 1 .073-.177M14 10.75a.75.75 0 0 0-1.5 0v1.5a.25.25 0 0 1-.25.25h-1.5a.75.75 0 0 0 0 1.5h1.5A1.75 1.75 0 0 0 14 12.25zM.75 10a.75.75 0 0 1 .75.75v1.5a.25.25 0 0 0 .25.25h1.5a.75.75 0 0 1 0 1.5h-1.5A1.75 1.75 0 0 1 0 12.25v-1.5A.75.75 0 0 1 .75 10m10-10a.75.75 0 0 0 0 1.5h1.5a.25.25 0 0 1 .25.25v1.5a.75.75 0 0 0 1.5 0v-1.5A1.75 1.75 0 0 0 12.25 0zM7 7.776a4.423 4.423 0 0 0-4.145 2.879c-.112.299.127.595.446.595h7.396c.32 0 .558-.296.447-.595a4.423 4.423 0 0 0-4.145-2.879Zm2.208-3.315a2.21 2.21 0 1 1-4.421 0a2.21 2.21 0 0 1 4.421 0" clip-rule="evenodd"/></svg>{{__('ui.profile')}}</a>
                        </li>
                        <li>
                            <a href="{{ route('announcements.create') }}" class="ps-3 py-2"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="1em" height="1em" viewBox="0 0 24 24">
                                    <g fill="none" fill-rule="evenodd">
                                        <path
                                            d="M24 0v24H0V0zM12.594 23.258l-.012.002l-.071.035l-.02.004l-.014-.004l-.071-.036c-.01-.003-.019 0-.024.006l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.016-.018m.264-.113l-.014.002l-.184.093l-.01.01l-.003.011l.018.43l.005.012l.008.008l.201.092c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022m-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.003-.011l.018-.43l-.003-.012l-.01-.01z" />
                                        <path fill="currentColor"
                                            d="M9 5a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v4h4a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2h-4v4a2 2 0 0 1-2 2h-2a2 2 0 0 1-2-2v-4H5a2 2 0 0 1-2-2v-2a2 2 0 0 1 2-2h4z" />
                                    </g>
                                </svg>{{ __('ui.user') }}</a>
                        </li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST"
                                class="navigation mx-2 bg-danger text-dark fw-bold">
                                @csrf
                                {{-- <a class="mx-1"
                                        onclick="event.preventDefault(); closest('form').submit();"
                                        href="{{ route('logout') }}">Logout
                                    </a> --}}
                                <a class="buttonLogout mx-1" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); closest('form').submit();">
                                    <img src="\storage\images\logout.png" class="imgLogout">

                                    <div class="logout">{{ __('ui.logout') }}</div>

                                </a>
                            </form>
                        </li>

                    </ul>
                </div>
            @endauth
        </div>
    </div>
    <script>
        let profile = document.querySelector('.profile');
        let menu = document.querySelector('.menu');

        profile.onclick = function() {
            menu.classList.toggle('active');
        }
    </script>
</nav>
