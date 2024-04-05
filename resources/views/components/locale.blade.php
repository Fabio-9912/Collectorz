<form class="d-inline" action="{{ route('setLocale', $lang) }}" method="post">
    @csrf
    <button type="submit" class="btn px-1 py-0 m-0">
        <img src="{{ asset('vendor/blade-flags/language-' . $lang . '.svg') }}" width="20" height="20" />
    </button>
</form>