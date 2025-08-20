<x-layouts.dashboard.master>
    <x-slot name="title">
        {{ __('dashboard.general.upload_file') }}
    </x-slot>

    @if (session('errors'))
        <div class="alert alert-danger">
            {{ session('errors')->first() }}
        </div>
    @endif

    <div class="card radius-12">
        <div class="card-body">
            <form action="{{ route('dashboard.users.upload-excel.upload') }}" method="POST"
                enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-lg-6">
                        <x-form.label for="file">{{ __('dashboard.general.upload_file') }}</x-form.label>

                        <x-form.input type="file" name="file" id="file"
                            placeholder="{{ __('dashboard.general.upload_file') }}" />

                        <x-form.error :messages="$errors->get('file')" />
                    </div>

                    <div class="col-lg-6">
                        <x-form.label for="action">{{ __('dashboard.general.action') }}</x-form.label>

                        <x-form.select2 id="action" name="action" :options="['create-update' => __('dashboard.general.create-update'), 'delete' => __('dashboard.general.delete'), 'force_delete' => __('dashboard.general.force_delete')]"
                            placeholder="{{ __('dashboard.general.select') }}" :selected="old('action')" />

                        <x-form.error :messages="$errors->get('action')" />
                    </div>
                </div>


                <x-form.actions>
                    <x-button type="submit" class="btn-primary-600">
                        {{ __('dashboard.general.submit') }}
                    </x-button>
                </x-form.actions>

            </form>
        </div>
    </div>
</x-layouts.dashboard.master>