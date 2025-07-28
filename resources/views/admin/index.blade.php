<x-layouts.admin.master>
    <x-slot name="title">
        Dashboard
    </x-slot>

    <div>
        <h1>Welcome, {{ auth()->guard('admin')->user()->name }}</h1>
        <h5 style="color: #333">{{ auth()->guard('admin')->user()->email }}</h5>
    </div>
</x-layouts.admin.master>