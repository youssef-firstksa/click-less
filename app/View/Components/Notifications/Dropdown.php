<?php

namespace App\View\Components\Notifications;

use App\Models\SystemNotification;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class Dropdown extends Component
{

    public Collection $notifications;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->notifications = SystemNotification::whereCanAccess()->latest()->limit(5)->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.notifications.dropdown');
    }
}
