<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
    public function createUser()
    {
        return view('admin.users.create');
    }

    public function storeUser(Request $request)
    {
        $validated = $request->validate([
            'firstname' => 'required|string|max:100',
            'lastname' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'phone' => 'nullable|string|max:20',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|in:admin,developer,user',
            'balance' => 'nullable|numeric|min:0',
            'status' => 'required|in:active,inactive',
            'photo' => 'nullable|image|max:2048',
        ]);

        $path = 'images/default-avatar.png';
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('images/users', 'public');
        }

        User::create([
            'farstname' => $validated['firstname'],
            'lastname' => $validated['lastname'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
            'balance' => $validated['balance'] ?? 0,
            'status' => $validated['status'],
            'photo' => $path,
            'remember_token' => \Str::random(10),
        ]);

        return redirect()->route('admin.users.index')
            ->with('success', 'کاربر جدید با موفقیت اضافه شد.');
    }
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', 'کاربر با موفقیت حذف شد.');
    }
    public function search(Request $request)
    {
        $query = $request->get('q', '');
        $users = User::where('farstname', 'like', "%$query%")
            ->orWhere('lastname', 'like', "%$query%")
            ->take(10)
            ->get(['id', 'farstname', 'lastname']);

        return response()->json($users);
    }


}
