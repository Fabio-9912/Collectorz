<x-main>
    <div class="register-dark">
        <form action="{{ route('announcements.contactSeller', ['announcement' => $announcement->id]) }}" method="POST"
            style="max-width:400px!important">
            @csrf
            <h2 class="fs-1 mb-5 mt-0 text-center fw-semibold" style="color:#4B6C8B;">{{__('ui.addRequest')}}</h2>
            <div class="form-group mb-4">
                <label>{{ __('ui.nomeForm') }}</label>
                <input class="form-control text-white" type="text" disabled name="name"
                    value="{{ Auth::user()->name }}">
            </div>
            <div class="form-group mb-4">
                <label>{{ __('ui.emailForm') }}</label>
                <input class="form-control text-white" type="text" disabled name="email"
                    value="{{ Auth::user()->email }}">
            </div>
            <div class="form-group mb-0">
                <label class="pb-0 textareaLabel">{{__('ui.contactSeller')}}</label>
                <textarea class="mb-2 p-3" name="description" id="" cols="30" rows="10">{{__('ui.interestedIn')}}
{{ $announcement->getName() }}!
                </textarea>
                {{-- <button class="btn btn-primary btn-block mt-0 mb-0" type="submit">Invia richiesta</button> --}}
                <button class="btn btn-primary w-100" type="submit" onclick="document.querySelector('.sendRequest').classList.add('spinner-border', 'spinner-border-sm')">
                    <span class="sendRequest me-2" role="status" aria-hidden="true"></span>
                    {{__('ui.sendRequest')}}
                </button>
                <x-message />
            </div>
        </form>
    </div>
</x-main>
