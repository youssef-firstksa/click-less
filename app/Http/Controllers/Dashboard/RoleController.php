<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('list-role');

        $roles = Role::commonFilters([
            'search' => ['translation.title'],
        ])->commonPaginate();

        return view('dashboard.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create-role');

        $permissionOptions = Permission::all()->groupBy('group');
        return view('dashboard.roles.create', compact('permissionOptions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request)
    {
        Gate::authorize('create-role');

        $role = Role::create($request->validated());
        $role->permissions()->sync($request->permission_ids);

        return redirect()->route('dashboard.roles.index')->with('success', __('dashboard.messages.success.created', ['resource' => $role->title]));
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        Gate::authorize('show-role');
        // return view('dashboard.roles.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        Gate::authorize('update-role');

        $permissionOptions = Permission::all()->groupBy('group');

        return view('dashboard.roles.edit', compact('role', 'permissionOptions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        Gate::authorize('update-role');

        $role->update($request->validated());
        $role->permissions()->sync($request->permission_ids);

        return redirect()->route('dashboard.roles.index')->with('success', __('dashboard.messages.success.updated', ['resource' => $role->title]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        Gate::authorize('delete-role');

        $role->delete();
        return redirect()->route('dashboard.roles.index')->with('success', __('dashboard.messages.success.deleted', ['resource' => $role->title]));
    }
}
