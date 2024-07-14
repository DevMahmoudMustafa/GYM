<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Membership;
use function Pest\Laravel\get;

class UserController extends Controller
{
    public function index()
    {
        $titlePage = 'جميع المستخدمين';
        $users = User::with('membership')->get();
        return view('users.index', get_defined_vars());
    }

    public function listUsersNotHaveMembership()
    {
        $titlePage = 'قائمة المستخدمين الذين لا يحتوي على عضوية';
        $users = User::doesntHave('membership')->get();
        return view('users.index', get_defined_vars());
    }

    public function listUsersHaveMembershipActive()
    {
        $titlePage = 'اشتراكات جارية';
        $users = User::withWhereHas('membership', function ($q){
            $q->where('end_date', '>=', now());
        })->get();
        return view('users.index', get_defined_vars());
    }
    public function listUsersHaveMembershipExpiringSoon()
    {
        $titlePage = 'اشتراكات قريبة من الانتهاء';
        $users = User::join('memberships', 'users.id', '=', 'memberships.user_id')
            ->whereDate('memberships.end_date', '>=', now())
            ->whereDate('memberships.end_date', '<=', now()->addDays(7))
            ->orderBy('memberships.end_date', 'asc')
            ->get(['users.*', 'memberships.end_date']);

        return view('users.index', compact('titlePage', 'users'));
    }



    public function listUsersHaveMembershipExpired()
    {
        $titlePage = 'اشتراكات منتهية';
        $users = User::join('memberships', 'users.id', '=', 'memberships.user_id')
            ->whereDate('memberships.end_date', '<', now())
            ->orderByDesc('memberships.end_date')
            ->get(['users.*']);

        return view('users.index', compact('titlePage', 'users'));

    }


    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        // التحقق من صحة البيانات المدخلة
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:15',
            'price' => 'required|integer',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'walker_count' => 'nullable|integer',
            'note' => 'nullable|string',
        ]);

        // إنشاء المستخدم الجديد
        $user = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
        ]);

        // إذا تم تقديم بيانات العضوية، يتم إنشاء العضوية
        if ($request->price && $request->start_date && $request->end_date) {
            Membership::create([
                'user_id' => $user->id,
                'price' => $request->price,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'walker_count' => $request->walker_count ?? 0,
                'note' => $request->note,
            ]);
        }

        // إعادة التوجيه إلى صفحة المستخدمين
        return redirect()->route('users.index')->with('success', 'تم إضافة المستخدم بنجاح.');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:255',
            'price' => 'required|integer',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'walker_count' => 'nullable|integer',
            'note' => 'nullable|string',
        ]);

        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->save();

        if ($request->filled('price') && $request->filled('start_date') && $request->filled('end_date')) {
            $user->membership()->updateOrCreate(
                ['user_id' => $user->id],
                [
                    'price' => $request->price,
                    'start_date' => $request->start_date,
                    'end_date' => $request->end_date,
                    'walker_count' => $request->walker_count ?? 0,
                    'note' => $request->note,
                ]
            );
        }

        return redirect()->route('users.index')->with('success', 'تم تحديث بيانات المستخدم بنجاح');
    }

}
