<x-main>
    @vite(['resources/js/carouselRevisor.js'])
    @if ($announcementsNullCounter == 0)
        <div class="container-fluid hero-header mb-0 py-5" style="background: #4B6C8B;">
            <x-message />
            <div class="container mt-2">
                <div class="row g-5 align-items-center ">
                    <div class="text-center">
                        <div>
                            <h3 class="fw-light text-white animated slideInRight font-weight-bold "></h3>
                            <h1 class="display-4 text-white animated slideInRight"> <span
                                    class="fw-light text-dark"></span>
                            </h1>
                            <p class="text-brown mb-9 animated pulse infinite fw-bold fs-2 text-white">
                                {{ __('ui.nothingToRev') }}</p>
                            <a href="{{ route('homepage') }}"
                                class="btn btn-dark py-2 px-4 me-3 animated slideInRight">{{ __('ui.redirectHome') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <section class="section-products @if ($announcementsNullCounter == 0) d-none @endif" style="background: #4B6C8B;">
        <x-message />
        <div class="container rounded" style="background: #fffff0;">
            <div class="row announcementAddRejectBox align-items-center justify-content-center">
                @foreach ($announcements as $announcement)
                    @if ($announcement->user_id != Auth::user()->id)
                        <!--  Start Carousel Slider 1 -->
                        <div class="col-12 col-xl-6 slider p-0 m-3 border border-2 rounded" id="slider1">
                            <!-- Slides -->
                            @foreach ($announcement->images as $image)
                                <div style="background-image" class="p-2">
                                    <img src="{{ $image->getUrl(300, 350) }}" alt=""
                                        class="rounded mx-auto d-block h-100">
                                </div>
                            @endforeach
                            <!-- The Arrows -->
                            <i class="left" class="arrows" style="z-index:2; position:absolute;"><svg
                                    viewBox="0 0 100 100">
                                    <path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z"></path>
                                </svg></i>
                            <i class="right" class="arrows" style="z-index:2; position:absolute;"><svg
                                    viewBox="0 0 100 100">
                                    <path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z"
                                        transform="translate(100, 100) rotate(180) "></path>
                                </svg></i>
                            <!-- Title Bar -->
                            <span class="titleBar">
                                <h1 class="text-center">{{ $announcement->title }} </h1>
                            </span>
                        </div>
                        {{-- End carousel  --}}
                        <div class="col-12 col-xl-4">
                            <div class="bagde-flag-wrap-category d-flex flex-row mt-0 mb-3"><span>
                                    <span class="bagde-flag-category"
                                        @if ($announcement->category->name == 'Numistica') style="background:#FFDB58;" @elseif ($announcement->category->name == 'Strumenti Musicali') style="background:#B0C4DE;"  @elseif ($announcement->category->name == 'Gioielli') style="background:#856518;" @elseif ($announcement->category->name == 'Mobili Antichi') style="background:#E97451;" @elseif ($announcement->category->name == 'Vini e Liquori') style="background:#6C192B;" @elseif ($announcement->category->name == 'Carte Collezionabili') style="background:#8F9779;" @elseif ($announcement->category->name == 'Dischi e Vinili') style="background:#FFFFF0; color:black;" @elseif ($announcement->category->name == 'Oggetti da Guerra') style="background:#708090;" @elseif ($announcement->category->name == 'Motori') style="background:#F4C2C2;" @elseif ($announcement->category->name == 'Orologi') style="background:#AFEEEE;" @endif>
                                        {{ $announcement->category->name }}
                                    </span>
                            </div>
                            <div class="card-body">
                                <h5 class="tc-accent">{{ __('ui.imgRev') }}</h5>
                                <p>{{ __('ui.adults') }} <span
                                        class="@foreach ($announcement->images as $image) {{ $image->adult }} @endforeach"></span>
                                </p>

                                <p>{{ __('ui.satire') }} <span
                                        class="@foreach ($announcement->images as $image) {{ $image->spoof }} @endforeach"></span>
                                </p>
                                <p>{{ __('ui.medicine') }} <span
                                        class="@foreach ($announcement->images as $image) {{ $image->medical }} @endforeach"></span>
                                </p>
                                <p>{{ __('ui.violence') }} <span
                                        class="@foreach ($announcement->images as $image) {{ $image->violence }} @endforeach"></span>
                                </p>
                                <p>{{ __('ui.explixit') }} <span
                                        class="@foreach ($announcement->images as $image) {{ $image->racy }} @endforeach"></span>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-xl-2 mt-3">
                                <h5 class="fw-bold mt-3">{{ __('ui.tags') }}</h5>
                                <div class="ps-0 py-2 pe-2 tags">
                                    @foreach ($announcement->images as $image)
                                        @if ($image->labels)
                                            @foreach ($image->labels as $label)
                                                <p class="d-inline fw-semibold color me-1">#{{ $label }} </p>
                                            @endforeach
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-12 col-xl-8 mt-3">
                                <div class="row pe-4">
                                    <h5 class="fw-bold col-12 mt-3">{{ __('ui.announcementDescription') }}</h5>
                                    <hr class="pe-0">
                                    <p class="description">
                                        <em>
                                            {{ $announcement->description }}
                                        </em>
                                    </p>
                                    <h5 class="fw-bold">{{ __('ui.priceAnn') }}</h5>
                                    <hr class="pe-0">
                                    <p>
                                        <span id="price"
                                            class="fw-semibold fs-5 @if (App::isLocale('en')) d-none @endif ">€
                                            {{ number_format($announcement->price, 2) }}
                                        </span>
                                        <span id="price"
                                            class="fw-semibold fs-5 @if (App::isLocale('it')) d-none @elseif (App::isLocale('es')) d-none @endif ">£
                                            {{ number_format($announcement->price * $result, 2) }}
                                        </span>
                                    </p>
                                </div>

                            </div>
                            <div class="col-12 col-xl-2">
                                <div
                                    class="d-flex flex-row flex-xl-column justify-content-evenly justify-content-between align-items-center my-5 ">
                                    <form class="shadow-none mb-xl-3"
                                        action="{{ route('accept_announcement', ['announcement' => $announcement]) }}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')
                                        {{-- <button class="btn btn-success" type="submit">Approva annuncio</button> --}}
                                        <button id="btn1" class="buttons btn-hover-shadow rounded"
                                            onclick="document.querySelector('.sendRequest').classList.add('spinner-border', 'spinner-border-sm');">
                                            <span class="sendRequest" role="status" aria-hidden="true"></span>
                                            <span>{{ __('ui.accept') }}</span>
                                        </button>
                                    </form>
                                    <form class="shadow-none mt-xl-3"
                                        action="{{ route('reject_announcement', ['announcement' => $announcement]) }}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="d-flex flex-row flex-xl-column">
                                            <button id="btn2" class="buttons btn-hover-shadow rounded me-3 mb-lg-2 me-xl-0"
                                                onclick="document.querySelector('.sendRequest2').classList.add('spinner-border', 'spinner-border-sm');">
                                                <span class="sendRequest2" role="status" aria-hidden="true"></span>
                                                <span>{{ __('ui.reject') }}</span>
                                            </button>
                                            <div class="d-flex flex-column">
                                                <span>
                                                    <input id="image" class="p-1" type="checkbox" name="image"
                                                        value="image">
                                                    Immagine
                                                </span>
                                                <span>
                                                    <input id="description" class="p-1" type="checkbox"
                                                        name="description" value="description">
                                                    Descrizione
                                                </span>
                                                <span class="d-none">
                                                    <input id="title" class="p-1" type="checkbox" name="title"
                                                        checked value="{{ $announcement->title }}">
                                                </span>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
    <script>
        function colorGen() {
            return `rgb(${(Math.floor(Math.random() * 150))}, ${(Math.floor(Math.random() * 150))}, ${(Math.floor(Math.random() * 150))})`
        }
        const color = document.querySelectorAll('.color')
        color.forEach((element) => {
            element.style.color = colorGen();
        })
    </script>
</x-main>
