<x-main>
    <div class="container-fluid hero-header py-5" style="background: #4B6C8B;">
        <div class="container">
            <div class="row justify-content-between align-items-center ">
                <div class="col-12 col-lg-6">
                    <h3 class="fw-light text-white animated slideInRight font-weight-bold "></h3>
                    <h1 class="display-4 text-white animated slideInRight"> <span
                            class="fw-light text-dark"></span></h1>
                    <p class="text-brown mb-9 animated pulse infinite fw-bold fs-2 text-white">
                        {{__('ui.whoops')}}
                    </p>
                        <a href="{{ route('homepage') }}" class="btn btn-dark py-2 px-4 me-3 animated slideInRight">{{__('ui.redirectHome')}}</a>
                </div>
                <div class="col-12 col-lg-6">
                    <img class=" rounded-pill img-fluid animated pulse infinite imgPulse"
                        src="\storage\images\Collectorz_test.png" alt="logo sito">
                </div>
            </div>
        </div>
    </div>
</x-main>