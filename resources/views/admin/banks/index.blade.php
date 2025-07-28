<x-layouts.admin.master>
    <x-slot name="title">
        Banks List
    </x-slot>

    <div class="card">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr class="fw-semibold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                        <th>#</th>
                        <th>Title</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($banks as $bank)
                        <tr>
                            <td>{{$bank->id}}</td>
                            <td>{{$bank->title}}</td>
                            <td>
                                <a href="{{ route('admin.banks.edit', $bank) }}" class="btn btn-sm btn-success">
                                    Edit
                                </a>
                                <a href="#" class="btn btn-sm btn-danger">
                                    Delete
                                </a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

        <div class="my-3 px-3">
            {{ $banks->links() }}
        </div>
    </div>
</x-layouts.admin.master>