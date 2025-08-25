<div class="dropdown d-none d-sm-inline-block">
    <button class="bank-toggle-button d-flex justify-content-center align-items-center" type="button"
        data-bs-toggle="dropdown">

        <iconify-icon class="icon" icon="solar:repeat-line-duotone"></iconify-icon>

        {{ auth()->user()->activeBank()->title }}
    </button>

    <div class="dropdown-menu to-top dropdown-menu-sm">
        <div class="py-12 px-16 radius-8 bg-primary-50 mb-16 d-flex align-items-center justify-content-between gap-2">
            <div>
                <h6 class="text-lg text-primary-light fw-semibold mb-0">
                    اختر البنك
                </h6>
            </div>
        </div>

        <div class="max-h-400-px overflow-y-auto scroll-sm pe-8">

            @foreach ($banks as $bank)
                <div class="form-check style-check d-flex align-items-center justify-content-between mb-16">


                    <a href="{{ route('agent.update-active-bank', ['bank_id' => $bank->id]) }}">
                        {{ $bank->title }}
                    </a>
                </div>
            @endforeach

        </div>
    </div>
</div>