<?php

namespace App\Policies;

use App\Models\SystemNotification;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class SystemNotificationPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        if ($user->can('list-notification')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, SystemNotification $notification): bool
    {
        return $user->can('show-notification') && $user->banks()->pluck('banks.id')->contains($notification->bank_id);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create-notification');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, SystemNotification $notification): bool
    {
        return $user->can('update-notification') && $user->banks()->pluck('banks.id')->contains($notification->bank_id);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, SystemNotification $notification): bool
    {
        return $user->can('delete-notification') && $user->banks()->pluck('banks.id')->contains($notification->bank_id);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, SystemNotification $notification): bool
    {
        return $user->can('restore-notification') && $user->banks()->pluck('banks.id')->contains($notification->bank_id);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, SystemNotification $notification): bool
    {
        return $user->can('force-delete-notification') && $user->banks()->pluck('banks.id')->contains($notification->bank_id);
    }
}
