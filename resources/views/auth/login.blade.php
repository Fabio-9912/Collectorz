<x-main>
    <x-slot name="title">
        {{__('ui.login')}} - Collectorz
    </x-slot>
    <div class="login-dark">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <h2 class="text-white text-center">{{__('ui.login')}}</h2>
            <div class="illustration"><i class="icon ion-ios-locked-outline" style="color: #4B6C8B;"></i></div>
            <div class="form-group mb-4">
                <label>{{__('ui.emailForm')}}</label>
                <input class="form-control text-white" type="email" name="email">
                @error('email')
                    <span class="message text-alert">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label>{{__('ui.passwordForm')}}</label>
                <input class="form-control text-white" type="password" name="password" id="myInput">
                <div onclick="showPassword()" class="showPwd"><svg xmlns="http://www.w3.org/2000/svg" class="eye"
                        width="1em" height="1em" viewBox="0 0 24 24">
                        <g fill="currentColor" fill-rule="evenodd" clip-rule="evenodd">
                            <path
                                d="M8.25 12a3.75 3.75 0 1 1 7.5 0a3.75 3.75 0 0 1-7.5 0M12 9.75a2.25 2.25 0 1 0 0 4.5a2.25 2.25 0 0 0 0-4.5" />
                            <path
                                d="M4.323 10.646c-.419.604-.573 1.077-.573 1.354c0 .277.154.75.573 1.354c.406.583 1.008 1.216 1.77 1.801C7.62 16.327 9.713 17.25 12 17.25s4.38-.923 5.907-2.095c.762-.585 1.364-1.218 1.77-1.801c.419-.604.573-1.077.573-1.354c0-.277-.154-.75-.573-1.354c-.406-.583-1.008-1.216-1.77-1.801C16.38 7.673 14.287 6.75 12 6.75s-4.38.923-5.907 2.095c-.762.585-1.364 1.218-1.77 1.801m.856-2.991C6.91 6.327 9.316 5.25 12 5.25s5.09 1.077 6.82 2.405c.867.665 1.583 1.407 2.089 2.136c.492.709.841 1.486.841 2.209c0 .723-.35 1.5-.841 2.209c-.506.729-1.222 1.47-2.088 2.136c-1.73 1.328-4.137 2.405-6.821 2.405s-5.09-1.077-6.82-2.405c-.867-.665-1.583-1.407-2.089-2.136C2.6 13.5 2.25 12.723 2.25 12c0-.723.35-1.5.841-2.209c.506-.729 1.222-1.47 2.088-2.136" />
                        </g>
                    </svg></div>
                @error('password')
                    <span class="message text-alert">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group text-center mb-3"><button class="btn btn-primary btn-block w-100" type="submit" onclick="document.querySelector('.sendRequest').classList.add('spinner-border', 'spinner-border-sm')"><span class="sendRequest me-2" role="status" aria-hidden="true"></span>{{__('ui.login')}}</button>
            </div>
            <div class="mb-2 text-center">
                <div class="mb-2">{{__('ui.orSignIn')}}</div>
                <a href="{{ route('google.redirect') }}">
                    <img src="\storage\images\google_logo.png" class="google" alt="Login Google">
                </a>
                <a href="{{ route('facebook.redirect') }}">
                    <img src="\storage\images\facebook_logo.png" class="facebook" alt="Login facebook">
                </a>
                {{-- <a href="{{ route('linkedin.redirect') }}">
                    <img src="\storage\images\linkedin_logo.png" class="linkedin" alt="Login linkedin">
                </a> --}}
            </div>
            <a href="{{ route('register') }}" class="forgot fw-semibold">{{__('ui.notRegistered')}}</a>
        </form>
    </div>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script> --}}
    <script>
        function showPassword() {
            let myInput = document.getElementById("myInput");
            let showPwd = document.querySelector(".showPwd");
            if (myInput.type === "password") {
                myInput.type = "text";
                showPwd.innerHTML =
                    `<svg xmlns="http://www.w3.org/2000/svg" class="eye" width="1em" height="1em" viewBox="0 0 36 36"><path fill="currentColor" d="M18.37 11.17a6.79 6.79 0 0 0-2.37.43l8.8 8.8a6.78 6.78 0 0 0 .43-2.4a6.86 6.86 0 0 0-6.86-6.83" class="clr-i-solid clr-i-solid-path-1"/><path fill="currentColor" d="M34.29 17.53c-3.37-6.23-9.28-10-15.82-10a16.82 16.82 0 0 0-5.24.85L14.84 10a14.78 14.78 0 0 1 3.63-.47c5.63 0 10.75 3.14 13.8 8.43a17.75 17.75 0 0 1-4.37 5.1l1.42 1.42a19.93 19.93 0 0 0 5-6l.26-.48Z" class="clr-i-solid clr-i-solid-path-2"/><path fill="currentColor" d="m4.87 5.78l4.46 4.46a19.52 19.52 0 0 0-6.69 7.29l-.26.47l.26.48c3.37 6.23 9.28 10 15.82 10a16.93 16.93 0 0 0 7.37-1.69l5 5l1.75-1.5l-26-26Zm8.3 8.3a6.85 6.85 0 0 0 9.55 9.55l1.6 1.6a14.91 14.91 0 0 1-5.86 1.2c-5.63 0-10.75-3.14-13.8-8.43a17.29 17.29 0 0 1 6.12-6.3Z" class="clr-i-solid clr-i-solid-path-3"/><path fill="none" d="M0 0h36v36H0z"/></svg>`
            } else {
                myInput.type = "password";
                showPwd.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" class="eye"
                        width="1em" height="1em" viewBox="0 0 24 24">
                        <g fill="currentColor" fill-rule="evenodd" clip-rule="evenodd">
                            <path
                                d="M8.25 12a3.75 3.75 0 1 1 7.5 0a3.75 3.75 0 0 1-7.5 0M12 9.75a2.25 2.25 0 1 0 0 4.5a2.25 2.25 0 0 0 0-4.5" />
                            <path
                                d="M4.323 10.646c-.419.604-.573 1.077-.573 1.354c0 .277.154.75.573 1.354c.406.583 1.008 1.216 1.77 1.801C7.62 16.327 9.713 17.25 12 17.25s4.38-.923 5.907-2.095c.762-.585 1.364-1.218 1.77-1.801c.419-.604.573-1.077.573-1.354c0-.277-.154-.75-.573-1.354c-.406-.583-1.008-1.216-1.77-1.801C16.38 7.673 14.287 6.75 12 6.75s-4.38.923-5.907 2.095c-.762.585-1.364 1.218-1.77 1.801m.856-2.991C6.91 6.327 9.316 5.25 12 5.25s5.09 1.077 6.82 2.405c.867.665 1.583 1.407 2.089 2.136c.492.709.841 1.486.841 2.209c0 .723-.35 1.5-.841 2.209c-.506.729-1.222 1.47-2.088 2.136c-1.73 1.328-4.137 2.405-6.821 2.405s-5.09-1.077-6.82-2.405c-.867-.665-1.583-1.407-2.089-2.136C2.6 13.5 2.25 12.723 2.25 12c0-.723.35-1.5.841-2.209c.506-.729 1.222-1.47 2.088-2.136" />
                        </g>
                    </svg>`;
            }
        }
    </script>
</x-main>
