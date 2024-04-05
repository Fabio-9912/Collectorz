<section class="section-products @if ($announcements->count() == 0) d-none @endif">
    <div class="container my-3">
        <div class="col-3">
            <select class="form-select" wire:model='byCategory' aria-label="Default select example">
                <option selected>Open this select menu</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-between">
            @foreach ($announcements->sortDesc() as $announcement)
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
                            <span class="bagde-flag text-center"> NEW </span>
                        </div>
                    @endif
                    <div id="product-1 mb-0"
                        class="single-product d-flex flex-column justify-content-center align-items-center">
                        <img src="{{ !$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(300, 350) : 'https://picsum.photos/400/600' }}"
                            class="img-fluid rounded imgCard" alt="">
                        <div class="part-2 d-flex flex-column justify-content-center align-items-center">
                            <h3 class="product-title pt-3 fw-bold">{{ $announcement->title }}</h3>
                            <h4 class="product-old-price text-danger">{{ $announcement->price * 1.2 }} €</h4>
                            <h4 class="product-price fs-3">{{ $announcement->price }} € </h4>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>
