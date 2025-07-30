@props(['status', 'content'])

<span
    class="bg-{{$status}}-focus text-{{$status}}-600 border-{{$status}}-main  border  px-24 py-4 radius-4 fw-medium text-sm">
    {{ $content }}
</span>