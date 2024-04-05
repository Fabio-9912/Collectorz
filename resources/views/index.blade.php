<x-main>
    <x-slot name="title">
        Homepage
    </x-slot>
    <x-spinner />
    <div class="container-fluid {{-- bg-primary --}} hero-header py-5" style="background: #4B6C8B;">
        <div class="container">
            <x-message />
            <div class="row g-5 align-items-center ">
                <div class="col-lg-6 text-center text-lg-start">
                    <h3 class="fw-light text-white animated slideInRight font-weight-bold ">{{ __('ui.welcome') }}</h3>
                    <h1 class="display-4 text-white animated slideInRight">SU <span
                            class="fw-light text-dark">COLLECTORZ</span></h1>
                    <p class="text-white mb-9 animated slideInRight ">{{ __('ui.description') }} </p>
                    @auth
                        <a href="{{ route('announcements.create') }}"
                            class="btn btn-dark py-2 px-4 me-3 animated slideInRight">{{ __('ui.inserisci') }}</a>
                    @endauth
                    <a href="{{ route('announcements.index') }}"
                        class="btn btn-outline-dark py-2 px-4 animated slideInRight">{{ __('ui.naviga') }}</a>
                </div>
                <div class="col-lg-6">
                    <img class=" rounded-pill img-fluid animated pulse infinite" src="img\theme1.jpg" alt="">
                </div>
            </div>
        </div>
    </div>

    <section class="section-products">
        <div class="container text-center fw-bold fs-1">
            {{-- Animazione categorie annunci  --}}
            <div class="row">
                <h4 class="wordCarousel main">
                    <span>{{ __('ui.ultimi') }} </span>
                    <div>
                        <ul class="flip5">
                            @foreach ($categories as $category)
                                <li>{{ $category->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </h4>
            </div>
            {{-- End text animation --}}


            <div class="row flex-row flex-wrap justify-content-evenly">
                @foreach ($announcements->sortDesc() as $announcement)
                    @if ($announcement->is_accepted)
                        <a href="{{ route('announcements.show', ['announcement' => $announcement]) }}"
                            class="col-12 col-md-5 col-lg-3 mx-lg-1 col-xl-2 border border-1 rounded announcementCard my-1">
                            <div class="bagde-flag-wrap-category">
                                <span class="bagde-flag-category"
                                    @if ($announcement->category->name == 'Numistica') style="background:#FFDB58;" @elseif ($announcement->category->name == 'Strumenti Musicali') style="background:#B0C4DE;"  @elseif ($announcement->category->name == 'Gioielli') style="background:#856518;" @elseif ($announcement->category->name == 'Mobili Antichi') style="background:#E97451;" @elseif ($announcement->category->name == 'Vini e Liquori') style="background:#6C192B;" @elseif ($announcement->category->name == 'Carte Collezionabili') style="background:#8F9779;" @elseif ($announcement->category->name == 'Dischi e Vinili') style="background:#FFFFF0; color:black;" @elseif ($announcement->category->name == 'Oggetti da Guerra') style="background:#708090;" @elseif ($announcement->category->name == 'Motori') style="background:#F4C2C2;" @elseif ($announcement->category->name == 'Orologi') style="background:#AFEEEE;" @endif>
                                    {{ $announcement->category->name }}
                                </span>
                            </div>
                            @if ($announcement->isNew)
                                <div class="bagde-flag-wrap">
                                    <span class="bagde-flag">{{ __('ui.newAnnouncement') }}</span>
                                </div>
                            @endif
                            <div id="product-1 mb-0"
                                class="single-product d-flex flex-column justify-content-center align-items-center">
                                <img src="{{ !$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(300, 350) : 'https://picsum.photos/400/600' }}"
                                    class="img-fluid rounded imgCard" alt="">
                                <div class="part-2 d-flex flex-column justify-content-center align-items-center">
                                    <h3 class="product-title pt-3 fw-bold">{{ $announcement->title }}</h3>
                                    <span id="price"
                                        class="product-old-price text-danger fs-5 @if (App::isLocale('en')) d-none @endif ">€
                                        {{ number_format($announcement->price * 1.05, 2) }}
                                    </span>
                                    <span id="price"
                                        class="fw-semibold fs-4 @if (App::isLocale('en')) d-none @endif ">€
                                        {{ number_format($announcement->price, 2) }}
                                    </span>
                                    {{-- Valuta GBP --}}
                                    <span id="price"
                                        class="product-old-price text-danger fs-5 @if (App::isLocale('it')) d-none @elseif (App::isLocale('es')) d-none @endif ">£
                                        {{ number_format($announcement->price * $result * 1.05, 2) }}
                                    </span>
                                    <span id="price"
                                        class="fw-semibold fs-4 @if (App::isLocale('it')) d-none @elseif (App::isLocale('es')) d-none @endif ">£
                                        {{ number_format($announcement->price * $result, 2) }}
                                    </span>
                                </div>
                            </div>
                        </a>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
    @php
        $totAnnouncements = count($announcementTop);
        $randomNumber = rand(0, $totAnnouncements - 1);
    @endphp
    <div class="container-fluid deal mb-5 py-5" style="background: #4B6C8B;">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner rounded-pill border-danger">
                            @foreach ($announcementTop[$randomNumber]->images as $image)
                                <div class="carousel-item active " style="height: 600px;">
                                    <img class="img-fluid animated pulse infinite" src="{{ $image->getUrl(300, 350) }}"
                                        alt="First slide">
                                </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="bg-white text-center p-4 rounded showProd">
                        <div class="border p-4">
                            <p class="mb-2">{{ $announcementTop[$randomNumber]->category->name }}</p>
                            <h2 class="fw-bold text-uppercase mb-4">{{ __('ui.affare') }}</h2>
                            <h2 class="display-4 text-primary mb-4 @if (App::isLocale('en')) d-none @endif ">€
                                {{ number_format($announcementTop[$randomNumber]->price, 2) }}</h2>
                            <h2
                                class="display-4 text-primary mb-4 @if (App::isLocale('it')) d-none @elseif (App::isLocale('es')) d-none @endif ">
                                £
                                {{ number_format($announcementTop[$randomNumber]->price * $result, 2) }}</h2>
                            <h5>{{ $announcementTop[$randomNumber]->title }}</h5>
                            <p class="mb-4">{{ $announcementTop[$randomNumber]->description }}</p>
                            <div class="row justify-content-center">
                                <div class="col-12">
                                    <h1 class="display-6" id="cdt-days"></h1>
                                    <a class="btn btn-primary py-2 px-4"
                                        href="{{ route('announcements.show', $announcementTop[$randomNumber]) }}">{{ __('ui.showAnn') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Blog Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 style="color: #4B6C8B;"><span class="fw-light text-dark">{{ __('ui.alcuni') }} </span>
                    {{ __('ui.blog') }}
                </h1>
                <p class="mb-5">{{ __('ui.scopri') }}</p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.1s" style="background-color: #E0CCBE;">
                    <div class="blog-item border h-100 p-4">
                        <img class="img-fluid mb-4" src="img\Dischi Vinili\Vinili.png" alt="">
                        <a href="" class="h5 lh-base d-inline-block">{{ __('ui.dischi') }}</a>

                        <p class="mb-4">{{ __('ui.blog1') }}</p>
                        <a href="" class="btn btn-outline-primary px-3">{{ __('ui.leggi di più') }}</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                    <div class="blog-item border h-100 p-4">
                        <img class="img-fluid mb-4" src="img\VEICOLI\sfondo.png" alt="">
                        <a href="" class="h5 lh-base d-inline-block">{{ __('ui.auto1') }}</a>
                        <div class="d-flex text-black-50 mb-2">

                        </div>
                        <p class="mb-4">{{ __('ui.blog2') }}</p>
                        <a href="" class="btn btn-outline-primary px-3">{{ __('ui.leggi di più') }}</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.5s" style="background-color: #E0CCBE;">
                    <div class="blog-item border h-100 p-4">
                        <img class="img-fluid mb-4" src="img\Strumenti musicali\sfondo.png" alt="">
                        <a href="" class="h5 lh-base d-inline-block">{{ __('ui.strumenti musicali') }}</a>
                        <div class="d-flex text-black-50 mb-2">

                        </div>
                        <p class="mb-4">{{ __('ui.blog3') }}</p>
                        <a href="" class="btn btn-outline-primary px-3">{{ __('ui.leggi di più') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog End -->


    <!-- Newsletter Start -->
    <div class="container-fluid newsletter pt-5 mt-5" style="background: #4B6C8B;">
        <div class="container pb-5">
            <div class="mx-auto text-center" data-wow-delay="0.1s">
                <h1 class="text-white mb-3"><span class="fw-light text-dark">{{ __('ui.iscriviti') }}</span>
                    {{ __('ui.newsletter') }}
                </h1>

                <p class="text-white mb-4">{{ __('ui.aggiornato') }}</p>

            </div>
            <div class="row justify-content-center">
                <div class="col-md-7 wow fadeIn" data-wow-delay="0.5s">
                    <form action="{{route('subscribe')}}" method="POST">
                        @csrf
                        <div class="position-relative w-100 mt-3 mb-2">
                            <input class="form-control w-100 py-4 ps-4 pe-5" type="email" name="email"
                                placeholder="{{ __('ui.email') }}" style="height: 48px;"> <br>
                            <button type="submit" class="btn shadow-none position-absolute top-0 end-0 mt-1 me-2 fw-semibold">{{ __('ui.iscriviti') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-main>
