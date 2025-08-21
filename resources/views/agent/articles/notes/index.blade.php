<x-layouts.agent.master>
    <x-slot name="title">
        {{ __('agent.article_notes_management.index_title') }}
    </x-slot>


    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-body p-24">
                        <div class="table-responsive scroll-sm">
                            <table class="table bordered-table sm-table mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">{{ __('dashboard.general.table_id') }}</th>
                                        <th scope="col">
                                            {{ __('dashboard.article_notes_management.form.title') }}
                                        </th>
                                        <th scope="col">
                                            {{ __('dashboard.article_notes_management.form.article') }}
                                        </th>
                                        <th scope="col" class="text-center">{{ __('dashboard.general.status') }}</th>
                                        <th scope="col" class="text-center">{{ __('dashboard.general.action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($notes as $note)
                                        <tr>
                                            <td>{{ $note->id }}</td>

                                            <td>{{ $note->title }}</td>
                                            <td>
                                                <a class="btn-link" title="{{ $note->article->title }}"
                                                    href="{{ route('agent.articles.show', $note->article_id) }}">
                                                    #{{ $note->article_id }}
                                                </a>
                                            </td>

                                            <td class="text-center">

                                                @if ($note->status == 'sent')
                                                    <x-status status="success"
                                                        :content="strtoupper(__('agent.article_notes_management.status.' . $note->status))" />
                                                @else
                                                    <x-status status="danger"
                                                        :content="strtoupper(__('agent.article_notes_management.status.' . $note->status))" />
                                                @endif
                                            </td>

                                            <td class="text-center">
                                                <div class="d-flex align-items-center gap-10 justify-content-center">


                                                    <x-table.actions.edit
                                                        route="{{ route('agent.articles.notes.edit', [$note->article, $note]) }}"
                                                        :model="$note" />
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


            </div>

            <div class="col-lg-3">
                <x-products-sidebar />
            </div>
        </div>
    </div>
</x-layouts.agent.master>