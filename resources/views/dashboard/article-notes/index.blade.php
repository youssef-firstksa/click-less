<x-layouts.dashboard.master>
    <x-slot name="title">
        {{ __('dashboard.article_notes_management.index_title') }}
    </x-slot>


    <div class="card">
        <div
            class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap gap-3 justify-content-between">

            <form action="{{ URL::current() }}" class="d-flex align-items-center flex-wrap gap-3">
                <x-table.filters.per-page />
                <x-table.filters.search />
                <x-table.filters.status :options="\App\Models\ArticleNote::statuses()" />
            </form>
        </div>

        <div class="card-body p-24">
            <div class="table-responsive scroll-sm">
                <table class="table bordered-table sm-table mb-0">
                    <thead>
                        <tr>
                            <th scope="col">{{ __('dashboard.general.table_id') }}</th>
                            <th scope="col">{{ __('dashboard.article_notes_management.form.title') }}</th>
                            <th scope="col" class="text-center">{{ __('dashboard.general.status') }}</th>
                            <th scope="col" class="text-center">{{ __('dashboard.general.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($notes as $note)
                        <tr>
                            <td>{{ $note->id }}</td>

                            <td>{{ $note->title }}</td>

                            <td class="text-center">

                                                @if ($note->status == 'sent')
                                                    <x-status status="success"
                                                        :content="strtoupper(__('dashboard.article_notes_management.status.' . $note->status))" />
                                                @else
                                                    <x-status status="danger"
                                                        :content="strtoupper(__('dashboard.article_notes_management.status.' . $note->status))" />
                                                @endif
                                            </td>

                            <td class="text-center">
                                <div class="d-flex align-items-center gap-10 justify-content-center">
                                    @can('show-article-note')
                                    <x-table.actions.show
                                        route="{{ route('dashboard.article-notes.show', $note) }}"
                                        :model="$note" />
                                    @endif

                                    {{-- @can('update-article-note')
                                    <x-table.actions.edit
                                        route="{{ route('dashboard.article-notes.edit', $note) }}"
                                        :model="$note" />
                                    @endif

                                    @can('delete-article-note')
                                    <x-table.actions.delete
                                        route="{{ route('dashboard.article-notes.destroy', $note) }}"
                                        :model="$note" />
                                    @endif --}}

                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


            <x-table.pagination :data="$notes" class="mt-3" />
        </div>
    </div>
</x-layouts.dashboard.master>