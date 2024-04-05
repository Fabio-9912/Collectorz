<x-main>
    @php
        $announcementsAccepted = App\Models\Announcement::where('is_accepted', null)->count();
    @endphp
    @if ($announcements->count() == 0)
        <div class="container-fluid hero-header mb-0 py-4" style="background-color: #4B6C8B;">
            <div class="container">
                <x-message />
                <div class="row flex-row-reverse g-5 align-items-center ">
                    <div class="col-lg-6 text-center text-lg-start">
                        <h3 class="fw-light text-white animated slideInRight font-weight-bold ">
                        </h3>
                        <h1 class="display-4 text-white animated slideInRight">COLLECTORZ</h1>
                        <p class="text-brown mb-9 animated slideInRight fs-2">
                            @if (!request()->routeIs('announcements.search'))
                                {{ __('ui.zeroAnnouncement') }}
                            @elseif (request()->routeIs('announcements.search'))
                                <span class="fw-bold">
                                    {{ __('ui.zeroAnnouncementSearch') }}
                                </span>
                            @endif
                        </p>
                        <a href="{{ route('homepage') }}"
                            class="btn btn-outline-dark py-2 px-4 animated slideInRight">{{ __('ui.redirectHome') }}</a>
                    </div>
                    <div class="col-lg-6">
                        <img class=" rounded-pill img-fluid animated pulse infinite imgPulse d-none d-md-block"
                            src="\storage\images\Collectorz_test.png" alt="logo sito">
                    </div>
                </div>
            </div>
        </div>
    @endif
    {{-- $announcementsAccepted != 0 || !request()->routeIs('announcements.search') ||  --}}
    <section class="section-products @if ($announcements->count() == 0) d-none @endif">
        {{-- <div class="container my-3">
            <div class="col-3">
                <select class="form-select" wire:model='byCategory' aria-label="Default select example">
                    <option selected>Open this select menu</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" onclick="func()">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div> --}}
        <div class="container">
            <div class="row justify-content-between">
                @foreach ($announcements->sortDesc() as $announcement)
                    @if ($announcement->is_accepted)
                        <a href="{{ route('announcements.show', ['announcement' => $announcement]) }}"
                            class="col-12 col-md-6 col-lg-4 col-xl-3 border border-1 rounded announcementCard mx-1 my-1"
                            style="width: 23%">
                            <div class="bagde-flag-wrap-category">
                                <span class="bagde-flag-category"
                                    @if ($announcement->category->name == 'Numistica') style="background:#FFDB58;" @elseif ($announcement->category->name == 'Strumenti Musicali') style="background:#B0C4DE;"  @elseif ($announcement->category->name == 'Gioielli') style="background:#856518;" @elseif ($announcement->category->name == 'Mobili Antichi') style="background:#E97451;" @elseif ($announcement->category->name == 'Vini e Liquori') style="background:#6C192B;" @elseif ($announcement->category->name == 'Carte Collezionabili') style="background:#8F9779;" @elseif ($announcement->category->name == 'Dischi e Vinili') style="background:#FFFFF0; color:black;" @elseif ($announcement->category->name == 'Oggetti da Guerra') style="background:#708090;" @elseif ($announcement->category->name == 'Motori') style="background:#F4C2C2;" @elseif ($announcement->category->name == 'Orologi') style="background:#AFEEEE;" @endif>
                                    {{ $announcement->category->name }}
                                </span>
                            </div>
                            @if ($announcement->isNew)
                                <div class="bagde-flag-wrap">
                                    <span class="bagde-flag text-center"> {{ __('ui.newAnnouncement') }} </span>
                                </div>
                            @endif
                            <div id="product-1 mb-0"
                                class="single-product d-flex flex-column justify-content-center align-items-center">
                                <img src="{{ !$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(300, 350) : 'https://picsum.photos/400/600' }}"
                                    class="img-fluid rounded imgCard" alt="">
                                <div class="part-2 d-flex flex-column justify-content-center align-items-center">
                                    <h3 class="product-title pt-3 fw-bold">{{ $announcement->title }}</h3>
                                    {{-- Valuta EUR --}}
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
</x-main>
