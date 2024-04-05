{{-- FOOTER --}}

<footer class="footer" class="text-white text-center text-lg-start" style="background-color: #3d301588;">
    <!-- Grid container -->
    <div class="container p-1">

        <!--Grid row-->
        <div class="row mt-4">

            <!--Grid column-->
            <div class="col-lg-4 col-md-12 mb-4 mb-md-0">
                <div class="row">
                    <a class="d-inline-block mb-3 col-6 mx-auto">
                        <img class="footerlog" src="\storage\images\Collectorz_test.png"
                            class="ms-5 border border-2 border-dark rounded-circle logo shadow-lg img-fluid w-100" style="height: 9em; width:9em;"
                            alt="FooterImg">
                    </a>
                    @auth
                        @if (!Auth::user()->is_revisor)
                            <div class="col-6">
                                <p class="mb-1">{{ __('ui.lavorare') }}
                                </p>
                                <a href="{{ route('workWithUs.revisor') }}"
                                    class="btn btn-outline-primary px-3">{{ __('ui.clicca') }}
                                </a>
                            </div>
                        @endif
                    @endauth
                </div>
                <h5 class="text-uppercase my-2">{{ __('ui.qualcosa') }}</h5>

                <p>
                    {{ __('ui.informazioni') }}
                </p>
            </div>

            <!--Grid column-->
            <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase mb-4">CONTATTI</h5>
                <ul class="fa-ul">
                    <li class="mb-3">
                        <span class="fa-li"><i class="bi bi-house-fill"></i></span><span class="ms-2">Via delle Margherite, 123 12345 Mesto (FI) Italia</span>    
                    </li>
                    <li class="mb-3">
                        <span class="fa-li"><i class="bi bi-envelope"></i></span><span></span><span
                            class="ms-2">collectorz@info.com</span>
                    </li>
                    <li class="mb-3">
                        <span class="fa-li"><i class="bi bi-phone"></i></span> <span></span>Mobile:<span
                            class="ms-2">+39 333 1234567</span>
                    </li>
                    <li class="mb-3">
                        <span class="fa-li"><i class="bi bi-telephone-inbound-fill"></i></span>Ufficio:<span
                            class="ms-2">+ 02 9876543</span>
                    </li>
                </ul>
                <div class="mt-4">
                    <!-- Facebook -->
                    <a type="button" href="https://www.facebook.com/" target="_blank"
                        class="btn btn-floating btn-warning btn-lg"><i class="bi bi-facebook"></i></a>
                    <!-- Dribbble -->
                    <a type="button" href="https://www.twitter.com/" target="_blank"
                        class="btn btn-floating btn-warning btn-lg"><i class="bi bi-twitter"></i></a>
                    <!-- Twitter -->
                    <a type="button" href="https://www.whatsapp.com/" target="_blank"
                        class="btn btn-floating btn-warning btn-lg"><i class="bi bi-whatsapp"></i></a>
                    <!-- Google + -->
                    <a type="button" href="https://www.google.com/" target="_blank"
                        class="btn btn-floating btn-warning btn-lg"><i class="bi bi-google"></i></a>
                    <!-- Linkedin -->
                </div>

            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase mb-4">{{ __('ui.orari') }}</h5>
                <table class="table text-center text-white border-dark">
                    <tbody class="font-weight-normal">
                        <tr>
                            <td class="p-1">{{ __('ui.lunedi') }}:</td>
                            <td class="p-1">8am - 9pm</td>
                        </tr>
                        <tr>
                            <td class="p-1">{{ __('ui.martedi') }}:</td>
                            <td class="p-1">8am - 9pm</td>
                        </tr>
                        <tr>
                            <td class="p-1">{{ __('ui.mercoledì') }}:</td>
                            <td class="p-1">8am - 9pm</td>
                        </tr>
                        <tr>
                            <td class="p-1">{{ __('ui.giovedì') }}:</td>
                            <td class="p-1">8am - 9pm</td>
                        </tr>
                        <tr>
                            <td class="p-1">{{ __('ui.venerdì') }}:</td>
                            <td class="p-1">8am - 1am</td>
                        </tr>
                        <tr>
                            <td class="p-1">{{ __('ui.sabato') }}:</td>
                            <td class="p-1">8am - 1am</td>
                        </tr>
                        <tr>
                            <td class="p-1">{{ __('ui.domenica') }}:</td>
                            <td class="p-1">9am - 10pm</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!--Grid column-->
        </div>
        <!--Grid row-->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2024 Copyright:
        <a class="text-white" href=#>© Collectorz srl, All Right Reserved.</a>
    </div>
    <!-- Copyright -->
</footer>

</div>
