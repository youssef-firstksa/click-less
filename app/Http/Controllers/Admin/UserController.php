<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
        return view('dashboard.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->validated());

        return redirect()->route('dashboard.users.index')->with('success', __('dashboard.messages.success.created', ['resource' => $user->name]));
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        // return view('dashboard.users.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('dashboard.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->validated();

        if (is_null($data['password'])) unset($data['password']);

        $user->update($data);

        return redirect()->route('dashboard.users.index')->with('success', __('dashboard.messages.success.updated', ['resource' => $user->name]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('dashboard.users.index');
    }
}
