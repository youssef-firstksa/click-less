<?php

namespace App\View\Components;

use App\Models\Bank;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class BankDropdown extends Component
{
    public Collection $banks;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        if (auth()->user()->role->name === 'super-admin') {
            $this->banks = Bank::all();
        } else {
            $this->banks = auth()->user()->banks->where('pivot.active', '!=', 1);
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.bank-dropdown');
    }
}
