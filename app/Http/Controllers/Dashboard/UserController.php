<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Bank;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Throwable;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('list-user');

        $users = User::whereNot('id', auth()->id())->commonFilters([
            'search' => ['translation.name', 'email', 'hr_id', 'phone'],
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

        $roles = Role::whereNot('name', 'super-admin')->translatedPluck('title');
        $bankOptions = Bank::whereActivated()->translatedPluck('title');


        return view('dashboard.users.create', compact('roles', 'bankOptions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        Gate::authorize('create-user');

        DB::beginTransaction();

        try {
            $data = $request->validated();
            $data['group'] = Str::slug($data['group']);

            $user = User::create($data);

            $user->roles()->sync($request->role_id);
            $user->banks()->sync($request->bank_ids);

            $bank = $user->banks()->first();
            $user->banks()->updateExistingPivot($bank->id, ['active' => 1]);

            DB::commit();
            return redirect()->route('dashboard.users.index')->with('success', __('dashboard.messages.success.created', ['resource' => $user->name]));
        } catch (Throwable $e) {
            DB::rollBack();
            return redirect()->route('dashboard.users.index')->with('error', __('dashboard.messages.error.create', ['resource' => $data[app()->getLocale()]['name']]));
        }
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

        $roles = Role::whereNot('name', 'super-admin')->translatedPluck('title');

        $bankOptions = Bank::whereActivated()->translatedPluck('title');
        $userBankIds = $user->banks->pluck('id')->toArray();

        return view('dashboard.users.edit', compact('user', 'roles', 'bankOptions', 'userBankIds'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        Gate::authorize('update-user');

        DB::beginTransaction();

        try {
            $data = $request->validated();

            $data['group'] = Str::slug($data['group']);

            if (is_null($data['password'])) unset($data['password']);

            $user->update($data);

            $user->roles()->sync($request->role_id);
            $user->banks()->sync($request->bank_ids);

            if (!$user->activeBank()) {
                $bank = $user->banks()->first();
                $user->banks()->updateExistingPivot($bank->id, ['active' => 1]);
            }

            DB::commit();

            return redirect()->route('dashboard.users.index')->with('success', __('dashboard.messages.success.updated', ['resource' => $user->name]));
        } catch (Throwable $e) {
            DB::rollBack();
            return redirect()->route('dashboard.users.index')->with('error', __('dashboard.messages.error.update', ['resource' => $user->name]));
        }
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
