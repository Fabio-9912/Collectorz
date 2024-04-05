<div class="container py-3 d-flex justify-content-center">
    @if (session('success'))
        <div class="alert alert-success h-50 py-2 my-0 fs-4" role="alert">
            {{ session('success') }}
        </div>
    @endif
    @if (session('unsuccess'))
        <div class="alert alert-danger h-50 py-2 my-0 fs-4" role="alert">
            {{ session('unsuccess') }}
        </div>
    @endif
</div>