<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $userCount = User::count();
        $activeMembershipsCount = Membership::where('end_date', '>', now())->count();
        $expiringSoonMembershipsCount = Membership::whereBetween('end_date', [now(), now()->addDays(30)])->count();
        $expiredMembershipsCount = Membership::where('end_date', '<', now())->count();

        return view('dashboard.index', compact('userCount', 'activeMembershipsCount', 'expiringSoonMembershipsCount', 'expiredMembershipsCount'));
    }
}
