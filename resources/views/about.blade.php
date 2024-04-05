<x-main>
    <div class="container-fluid py-3" style="background: #4B6C8B;">
        <div class="container mx-auto my-3 border border-2 rounded" style="background: #fffff0">
            <div class="row">
                <div class="col-12">
                    <p class="fw-bold fs-3">{{ __('ui.aboutUs') }}</p>
                    <p class="fw-semibold fst-italic fs-6">{{ __('ui.aboutUs1') }}</p>
                    <p class="fw-semibold fst-italic fs-6">{{ __('ui.aboutUs2') }}</p>
                    <p class="fw-semibold fst-italic fs-6">{{ __('ui.aboutUs3') }}</p>
                    <p class="fw-semibold fst-italic fs-6">{{ __('ui.aboutUs4') }}</p>
                    <p class="fw-semibold fst-italic fs-6">{{ __('ui.aboutUs5') }}</p>
                    <p class="fw-semibold fst-italic fs-6">{{ __('ui.aboutUs6') }}</p>
                    <p class="fw-semibold fst-italic fs-6">{{ __('ui.aboutUs7') }}</p>
                </div>
                <div class="row mx-auto">
                    <div class="col-md-9 d-none d-md-block"></div>
                    <a href="{{ route('announcements.index') }}"
                        class="btn btn-outline-dark py-2 px-4 animated slideInRight mb-2 col-12 col-md-3">{{ __('ui.naviga') }}</a>
                </div>
            </div>
        </div>
    </div>
</x-main>
