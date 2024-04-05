<x-main>
    <div class="register-dark">
        <form action="{{ route('become.revisor') }}" method="POST" style="max-width:400px!important">
            @csrf
            <h2 class="fs-1 mb-4 fw-bold mt-0 text-center titleWork" style="color: #4B6C8B;">{{__('ui.becomeRevisor')}}</h2>
            <div class="form-group mb-4">
                <label>{{__('ui.nomeForm')}}</label>
                <input class="form-control text-white" type="text" name="name" disabled value="{{ Auth::user()->name }}">
            </div>
            <div class="form-group mb-0">
                <label class="textareaLabel">{{__('ui.whyJoinTeam')}}</label>
                <textarea class="mb-2" name="description" id="" cols="30" rows="10"></textarea>
                <button class="btn btn-primary btn-block mt-0 mb-0" type="submit" onclick="document.querySelector('.sendRequest').classList.add('spinner-border', 'spinner-border-sm')"><span class="sendRequest me-2" role="status" aria-hidden="true"></span>{{__('ui.sendRequest')}}</button>
                <x-message />
            </div>
        </form>
    </div>
</x-main>




  