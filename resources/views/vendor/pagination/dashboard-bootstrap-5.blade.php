@if ($paginator->hasPages())
    <div class="flex-wrap gap-2 mt-24 d-flex align-items-center justify-content-between">
        <span>
            {!! __('Showing') !!}
            <span class="fw-semibold">{{ $paginator->firstItem() }}</span>
            {!! __('to') !!}
            <span class="fw-semibold">{{ $paginator->lastItem() }}</span>
            {!! __('of') !!}
            <span class="fw-semibold">{{ $paginator->total() }}</span>
            {!! __('results') !!}
        </span>

        <ul class="flex-wrap gap-2 pagination d-flex align-items-center justify-content-center">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true" title="@lang('pagination.previous')"
                    aria-label="@lang('pagination.previous')" style="cursor: not-allowed;user-select: none;>
                                                <span
                                                    class=" border-0 page-link bg-neutral-200 text-secondary-light fw-semibold
                    radius-8 d-flex align-items-center justify-content-center h-32-px w-32-px text-md">
                    <iconify-icon icon="{{ app()->getLocale() == 'ar' ? 'ep:d-arrow-right' : 'ep:d-arrow-left' }}"
                        class=""></iconify-icon>
                    </span>
                </li>
            @else
                <li class="page-item" title="@lang('pagination.previous')" aria-label="@lang('pagination.previous')">
                    <a class="border-0 page-link bg-neutral-200 text-secondary-light fw-semibold radius-8 d-flex align-items-center justify-content-center h-32-px w-32-px text-md"
                        href="{{ $paginator->previousPageUrl() }}" rel="prev">
                        <iconify-icon icon="{{ app()->getLocale() == 'ar' ? 'ep:d-arrow-right' : 'ep:d-arrow-left' }}"
                            class=""></iconify-icon>
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true">
                        <span
                            class="text-white border-0 page-link text-secondary-light fw-semibold radius-8 d-flex align-items-center justify-content-center h-32-px w-32-px text-md bg-primary-600">
                            {{ $element }}
                        </span>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="opacity-50 page-item active" style="cursor: not-allowed;user-select: none;" aria-current="page">
                                <span
                                    class="text-white border-0 page-link text-secondary-light fw-semibold radius-8 d-flex align-items-center justify-content-center h-32-px w-32-px text-md ">
                                    {{ $page }}
                                </span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="text-white border-0 bg-primary-600 page-link text-secondary-light fw-semibold radius-8 d-flex align-items-center justify-content-center h-32-px w-32-px text-md"
                                    href="{{ $url }}">
                                    {{ $page }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="border-0 page-link bg-neutral-200 text-secondary-light fw-semibold radius-8 d-flex align-items-center justify-content-center h-32-px w-32-px text-md"
                        href="{{ $paginator->nextPageUrl() }}" aria-label="@lang('pagination.next')" rel="next">
                        <iconify-icon icon="{{ app()->getLocale() == 'ar' ? 'ep:d-arrow-left' : 'ep:d-arrow-right' }}"
                            class=""></iconify-icon>
                    </a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')" style="cursor: not-allowed;user-select: none;>
                                                <span
                                                    class=" border-0 page-link bg-neutral-200 text-secondary-light fw-semibold
                    radius-8 d-flex align-items-center justify-content-center h-32-px w-32-px text-md" aria-hidden="true"
                    aria-label="@lang('pagination.next')">
                    <iconify-icon icon="{{ app()->getLocale() == 'ar' ? 'ep:d-arrow-left' : 'ep:d-arrow-right' }}"
                        class=""></iconify-icon>
                    </span>
                </li>
            @endif
        </ul>
    </div>
@endif