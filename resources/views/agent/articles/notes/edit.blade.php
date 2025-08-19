<x-layouts.agent.master>

    <x-slot name="title">
        {{ __('agent.article_notes_management.edit_title') }}
    </x-slot>


    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="card radius-12">
                    <div class="card-body">
                        <form
                            action="{{ route('agent.articles.notes.update', ['article' => $article, 'note' => $note]) }}"
                            method="POST">

                            @csrf
                            @method('PUT')

                            @include('agent.articles.notes.form', ['note' => $note])

                            <x-form.actions>
                                <x-button type="submit" class="btn-success-600">
                                    {{ __('agent.general.update') }}
                                </x-button>
                            </x-form.actions>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <x-products-sidebar />
            </div>
        </div>
    </div>


</x-layouts.agent.master>