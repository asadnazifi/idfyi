<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function showLogin()
    {
        return view('admin.auth.login');
    }
    public function login(Request $request)
    {
        // اعتبارسنجی ورودی‌ها
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:4',
        ]);

        // تلاش برای ورود با گارد admin
        if (
            Auth::guard('admin')->attempt(
                ['email' => $request->email, 'password' => $request->password],
                $request->has('remember')
            )
        ) {
            return redirect()->route('admin.dashboard');
        }

        // در صورت ناموفق بودن
        return back()->withErrors(['email' => 'ایمیل یا رمز عبور اشتباه است.'])->withInput($request->only('email'));
    }
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
    public function users(Request $request)
    {
        $query = User::query();

        // جستجو
        if ($request->filled('table_search')) {
            $search = $request->input('table_search');
            $query->where(function ($q) use ($search) {
                $q->where('lastname', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%");
            });
        }

        // مرتب‌سازی نزولی (جدیدترین کاربر اول)
        $users = $query->latest()->paginate(20);

        return view('admin.users.list', [
            'users' => $users,
            'search' => $request->input('table_search')
        ]);
    }
    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone' => 'nullable|string|max:15',
            'role' => 'required|in:admin,developer,user',
            'status' => 'required|in:active,inactive',
        ]);

        $user->update($validated);

        return redirect()->route('admin.users.index')
            ->with('success', 'کاربر با موفقیت ویرایش شد.');
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', 'کاربر با موفقیت حذف شد.');
    }



}
