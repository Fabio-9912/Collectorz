<x-main>
    @vite(['resources/js/carouselRevisor.js'])
    <section class="section-products" style="background: #4B6C8B;">
        <div class="container d-flex flex-column flex-xl-row shadow-lg rounded my-5 showProd" style="background: #fffff0;">
            <div class="col-12 col-xl-6 slider my-4 py-2 m-0 rounded" style="border:1px solid #887a6f;" id="slider1">
                <!-- Slides -->
                @foreach ($announcement->images as $image)
                    <div style="background-image">
                        <img src="{{ $image->getUrl(300, 350)}}" alt="" class="rounded mx-auto d-block h-100">
                    </div>
                @endforeach

                <!-- The Arrows -->
                <i class="left" class="arrows" style="z-index:2; position:absolute;"><svg viewBox="0 0 100 100">
                        <path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z"></path>
                    </svg></i>
                <i class="right" class="arrows" style="z-index:2; position:absolute;"><svg viewBox="0 0 100 100">
                        <path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z"
                            transform="translate(100, 100) rotate(180) "></path>
                    </svg></i>
                <!-- Title Bar -->
                <span class="titleBar">
                    <h1 class="text-center">{{ $announcement->title }} </h1>
                </span>
            </div>
            {{-- End carousel  --}}
            <div class="col-12 col-xl-6">
                <div class="bagde-flag-wrap-category col-12 d-flex flex-row mt-3 mb-0">
                    <div class="col-12">
                        <div class="d-flex flex-row align-items-center">
                            <h5 class="fw-bold mt-3">{{ __('ui.tags') }}</h5>
                            <span class="bagde-flag-category col-xl-4 ms-2"
                                @if ($announcement->category->name == 'Numistica') style="background:#FFDB58;height: fit-content; width:fit-content;" @elseif ($announcement->category->name == 'Strumenti Musicali') style="background:#B0C4DE;height: fit-content; width:fit-content;"  @elseif ($announcement->category->name == 'Gioielli') style="background:#856518;height: fit-content; width:fit-content;" @elseif ($announcement->category->name == 'Mobili Antichi') style="background:#E97451;height: fit-content; width:fit-content;" @elseif ($announcement->category->name == 'Vini e Liquori') style="background:#6C192B;height: fit-content; width:fit-content;" @elseif ($announcement->category->name == 'Carte Collezionabili') style="background:#8F9779;height: fit-content; width:fit-content;" @elseif ($announcement->category->name == 'Dischi e Vinili') style="background:#FFFFF0;height: fit-content; width:fit-content; color:black;height: fit-content; width:fit-content;" @elseif ($announcement->category->name == 'Oggetti da Guerra') style="background:#708090;height: fit-content; width:fit-content;" @elseif ($announcement->category->name == 'Motori') style="background:#F4C2C2;height: fit-content; width:fit-content;" @elseif ($announcement->category->name == 'Orologi') style="background:#AFEEEE;height: fit-content; width:fit-content;" @endif>
                                {{ $announcement->category->name }}
                            </span>
                        </div>
                        <div class="ps-0 py-2 pe-2 tags2">
                            @foreach ($announcement->images as $image)
                                @if ($image->labels)
                                    @foreach ($image->labels as $label)
                                        <p class="d-inline fw-semibold color me-1">#{{ $label }} </p>
                                    @endforeach
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-12 row pe-1">

                    <div class="mt-2">
                        <h5 class="fw-bold col-12 ">{{ __('ui.announcementDescription') }}</h5>
                        <hr class="pe-0 my-1">
                        <p class="description col-12 fst-italic">{{ $announcement->description }}</p>
                    </div>
                    <div>
                        <h5 class="fw-bold col-12">{{ __('ui.priceAnn') }}</h5>
                        <hr class="pe-0 mb-0">

                        <p class="col-12">
                        <div class="d-flex flex-row justify-content-between align-items-center ">
                            <span id="price"
                                class="fw-semibold fs-3 col-6 @if (App::isLocale('en')) d-none @endif ">€
                                {{ number_format($announcement->price) }}</span>
                            <span id="price"
                                class="fw-semibold fs-3 col-6 @if (App::isLocale('it')) d-none @elseif (App::isLocale('es')) d-none @endif ">£
                                {{ number_format($announcement->price * $result, 2) }}</span>
                            <div class="d-flex flex-row justify-content-start">
                                <a href="{{ route('announcements.formSeller', ['announcement' => $announcement->id]) }}"
                                     class="btn btnContact @auth
                                     @if ($announcement->user_id === Auth::user()->id) disable @endif
                                     @endauth"
                                    style="background-color: #6C192B; color:#F4C2C2;">
                                    {{ __('ui.contactSeller') }}
                                </a>
                            </div>
                        </div>

                        </p>
                    </div>


                </div>
            </div>
        </div>
        <div class="container p-2 rounded showProd showOverscroll @if ($announcementsPerCategories == 1 || $announcement->is_accepted === null) d-none @endif" style="background: #fffff0; border:1px solid #887a6f;">
            <div class="fs-4 fw-semibold text-center">{{ __('ui.relatedAds') }}</div>
            <div class="row m-2">
                <div class="similar-products mt-2 d-flex flex-row justify-content-start">
                    @foreach ($announcements as $item)
                        @if ($item->category_id == $announcement->category_id && $item->is_accepted)
                            <a href="{{ route('announcements.show', ['announcement' => $item]) }}"
                                class="relatedAnnouncements">

                                <div class="card border mb-1 showProd @if ($item->id == $announcement->id) d-none @endif"
                                    style="width: 9rem; height:14rem; margin-right: 10px;"> <img
                                        src="{{ $item->images()->first()->getUrl(300, 350) }}" height="180px" class="card-img-top p-2"
                                        alt="Immagine annuncio">
                                    <div class="my-1">
                                        <h6 class="text-center">{{ substr($item->title, 0, 8) }}...</h5>
                                    </div>
                                </div>
                            </a>
                        @endif
                    @endforeach
                </div>
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
