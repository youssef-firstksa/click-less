<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('list-user');

        $users = User::whereNot('id', auth()->id())->commonFilters([
            'search' => ['name', 'email'],
            'status' => 'status',
        ])->commonPaginate();

        return view('dashboard.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create-user');

        $roles = Role::translatedPluck('title');
        return view('dashboard.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        Gate::authorize('create-user');

        $user = User::create($request->validated());

        $user->roles()->sync($request->role_id);

        return redirect()->route('dashboard.users.index')->with('success', __('dashboard.messages.success.created', ['resource' => $user->name]));
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        Gate::authorize('show-user');
        // return view('dashboard.users.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        Gate::authorize('update-user');

        $roles = Role::translatedPluck('title');
        return view('dashboard.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        Gate::authorize('update-user');

        $data = $request->validated();

        if (is_null($data['password'])) unset($data['password']);

        $user->update($data);

        $user->roles()->sync($request->role_id);

        return redirect()->route('dashboard.users.index')->with('success', __('dashboard.messages.success.updated', ['resource' => $user->name]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        Gate::authorize('delete-user');

        $user->delete();
        return redirect()->route('dashboard.users.index')->with('success', __('dashboard.messages.success.deleted', ['resource' => $user->name]));
    }
}
