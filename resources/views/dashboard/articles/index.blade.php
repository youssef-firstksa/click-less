<x-layouts.dashboard.master>
    <x-slot name="title">
        {{ __('dashboard.articles_management.index_title') }}
    </x-slot>


    <div class="card">
        <div
            class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap gap-3 justify-content-between">

            <form action="{{ URL::current() }}" class="d-flex align-items-center flex-wrap gap-3">
                <x-dashboard.table.filters.per-page />
                <x-dashboard.table.filters.search />
                <x-dashboard.table.filters.status :options="\App\Enums\Status::labels()" />
            </form>

            @can('create-article')
                <x-dashboard.button class="btn-primary-600" :href="route('dashboard.articles.create')">
                    <iconify-icon icon="ic:baseline-plus" class="icon text-xl line-height-1"></iconify-icon>
                    {{ __('dashboard.general.add_new') }}
                </x-dashboard.button>
            @endcan
        </div>

        <div class="card-body p-24">
            <div class="table-responsive scroll-sm">
                <table class="table bordered-table sm-table mb-0">
                    <thead>
                        <tr>
                            <th scope="col">{{__('dashboard.general.table_id')}}</th>
                            <th scope="col">{{__('dashboard.articles_management.form.title')}}</th>
                            <th scope="col">{{__('dashboard.articles_management.form.author')}}</th>
                            <th scope="col" class="text-center">{{__('dashboard.general.status')}}</th>
                            <th scope="col">{{__('dashboard.articles_management.form.published_at')}}</th>
                            <th scope="col" class="text-center">{{__('dashboard.general.action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articles as $article)
                            <tr>
                                <td>{{ $article->id }}</td>

                                <td>{{ $article->title }}</td>

                                <td>{{ $article->author->name }}</td>

                                <td class="text-center">

                                    @if ($article->status == App\Enums\Status::ACTIVATED)
                                        <x-dashboard.status status="success" :content="strtoupper(__('dashboard.general.' . $article->status->value))" />
                                    @else
                                        <x-dashboard.status status="danger" :content="strtoupper(__('dashboard.general.' . $article->status->value))" />
                                    @endif
                                </td>

                                <td>
                                    {{ $article->publishedAt() }}
                                </td>

                                <td class="text-center">
                                    <div class="d-flex align-items-center gap-10 justify-content-center">
                                        @can('show-article')
                                            <x-dashboard.table.actions.show
                                                route="{{ route('dashboard.articles.show', $article) }}" :model="$article" />
                                        @endcan

                                        @can('update-article')
                                            <x-dashboard.table.actions.edit
                                                route="{{ route('dashboard.articles.edit', $article) }}" :model="$article" />
                                        @endcan

                                        @can('delete-article')
                                            <x-dashboard.table.actions.delete
                                                route="{{ route('dashboard.articles.destroy', $article) }}" :model="$article" />
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


            <x-dashboard.table.pagination :data="$articles" class="mt-3" />
        </div>
    </div>
    </x-layouts.admin.master>