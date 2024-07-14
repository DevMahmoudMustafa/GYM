<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use App\Models\User;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    public function index()
    {
        $memberships = Membership::with('user')->get();
        return view('memberships.index', compact('memberships'));
    }

    public function create()
    {
        $users = User::all();
        return view('memberships.create', compact('users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'type' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        Membership::create($validated);

        return redirect()->route('memberships.index');
    }

    public function showExpired()
    {
        $memberships = Membership::where('end_date', '<', now())->with('user')->get();
        return view('memberships.expired', compact('memberships'));
    }

    public function showExpiringSoon()
    {
        $memberships = Membership::whereBetween('end_date', [now(), now()->addDays(30)])->with('user')->get();
        return view('memberships.expiring-soon', compact('memberships'));
    }

    public function showActive()
    {
        $memberships = Membership::where('end_date', '>=', now())->with('user')->get();
        return view('memberships.active', compact('memberships'));
    }
}
