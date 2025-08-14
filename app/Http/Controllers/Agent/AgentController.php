<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function index()
    {
        return view('agent.index');
    }

    public function updateActiveBank()
    {
        $user = auth()->user();
        $bankId = request()->bank_id;

        if ($user->activeBank()->id == $bankId) {
            return back();
        }

        $userCanAccessBank = $user->banks()->where('banks.id', $bankId)->count();

        if ($userCanAccessBank == 0) {
            abort('403');
        }

        $user->banks()->update(['active' => 0]);
        $user->banks()->updateExistingPivot($bankId, ['active' => 1]);

        return redirect()->route('agent.index');
    }
}
