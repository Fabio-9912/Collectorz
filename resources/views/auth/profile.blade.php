<x-main>
    <x-slot name="title">
        Area Riservata {{ Auth::user()->name }}
    </x-slot>

    <div class="container-fluid {{-- bg-primary --}} hero-header py-5" style="background: #4B6C8B;">
        <div class="container">
            <x-message />
            <div class="row align-items-center mb-5">
                <div class="col-12 col-lg-6 text-center">
                    <h3 class="fw-light text-white animated slideInRight font-weight-bold ">{{ __('ui.welcomeBack') }},
                        <strong class="fs-2" style="color:#a87e62;">{{ Auth::user()->name }}</strong>
                    </h3>
                    <h1 class="display-4 text-white animated slideInRight">SU <span
                            class="fw-light text-dark">COLLECTORZ</span></h1>
                </div>
                <div class="col-12 col-lg-6 d-flex flex-column">
                    <a href="{{ route('announcements.create') }}"
                        class="btn btn-dark py-2 px-4 me-3 me-lg-0 mb-2 animated slideInRight w-100">{{ __('ui.inserisci') }}</a>

                    <a href="{{ route('announcements.index') }}"
                        class="btn btn-outline-dark py-2 px-4 mb-2 animated slideInRight">{{ __('ui.naviga') }}</a>
                </div>
                {{-- Profile info --}}
            </div>
            <livewire:table />
            <livewire:create-announcement />
        </div>
    </div>
    {{-- <script>
        const editForm = document.querySelector('.editForm');
        const edit = document.querySelector('.edit');
        editForm.addEventListener('click', () => {
            edit.classList.toggle('d-none');
        })
    </script> --}}
</x-main>
