@if ($announcement->is_accepted != null)
    <div class="col-md-6 col-lg-4 col-xl-3 border border-1 rounded p-2 m-1" style="width: 23%">
        <div id="product-1" class="single-product d-flex flex-column justify-content-center align-items-center">
            {{-- <div class="part-1">
                        <ul>
                                <li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
                                <li><a href="#"><i class="fas fa-heart"></i></a></li>
                                <li><a href="#"><i class="fas fa-plus"></i></a></li>
                                <li><a href="#"><i class="fas fa-expand"></i></a></li>
                        </ul>
                </div> --}}
            <img src="{{ 'https://picsum.photos/200/' . rand(292, 306) }}" class="img-fluid rounded" alt="">
            <div class="part-2 d-flex flex-column justify-content-center align-items-center">
                <h3 class="product-title">{{ $announcement->title }}</h3>
                <h4 class="product-old-price">{{ $announcement->price * 1.2 }} €</h4>
                <h4 class="product-price">{{ $announcement->price }} € </h4>
                <a href="{{ route('announcements.show', ['announcement' => $announcement]) }}"
                    class="btn btn-info">Visualizza annuncio</a>
            </div>
        </div>
    </div>
@endif
