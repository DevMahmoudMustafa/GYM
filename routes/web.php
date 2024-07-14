<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MembershipController;

// صفحة البداية، يمكن توجيهها إلى صفحة ترحيبية أو لوحة التحكم
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');


// routes لإدارة المستخدمين
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/not-have-membership', [UserController::class, 'listUsersNotHaveMembership'])->name('users.not-have-membership');
Route::get('/users/active-membership', [UserController::class, 'listUsersHaveMembershipActive'])->name('users.active-membership');
Route::get('/users/expiring-soon-membership', [UserController::class, 'listUsersHaveMembershipExpiringSoon'])->name('users.expiring-soon-membership');
Route::get('/users/expired-membership', [UserController::class, 'listUsersHaveMembershipExpired'])->name('users.expired-membership');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::post('/users', [UserController::class, 'store'])->name('users.store');

// routes لإدارة العضويات
Route::get('/memberships', [MembershipController::class, 'index'])->name('memberships.index');
Route::get('/memberships/create', [MembershipController::class, 'create'])->name('memberships.create');
Route::post('/memberships', [MembershipController::class, 'store'])->name('memberships.store');

// شاشة الأعضاء الذين انتهت عضويتهم
Route::get('/memberships/expired', [MembershipController::class, 'showExpired'])->name('memberships.expired');

// شاشة الأعضاء الذين اقتربوا على الانتهاء
Route::get('/memberships/expiring-soon', [MembershipController::class, 'showExpiringSoon'])->name('memberships.expiring-soon');

// شاشة الأعضاء الفعالين
Route::get('/memberships/active', [MembershipController::class, 'showActive'])->name('memberships.active');
