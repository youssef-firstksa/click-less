<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = Admin::whereNot('id', auth()->guard('admin')->id())->commonFilters([
            'search' => ['name', 'email'],
            'status' => 'status',
        ])->commonPaginate();

        return view('admin.admins.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdminRequest $request)
    {
        $admin = Admin::create($request->validated());

        return redirect()->route('admin.admins.index')->with('success', __('admin.messages.success.created', ['resource' => $admin->name]));
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        // return view('admin.admins.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        return view('admin.admins.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        $data = $request->validated();

        if (is_null($data['password'])) unset($data['password']);

        $admin->update($data);

        return redirect()->route('admin.admins.index')->with('success', __('admin.messages.success.updated', ['resource' => $admin->name]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();
        return redirect()->route('admin.admins.index');
    }
}
