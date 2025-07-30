@props(['data'])

{{ $data->appends(request()->query())->links() }}