<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\SupportTicket;
use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function login()
    {
        // اگر کاربر هنوز وارد نشده فرم نمایش داده می‌شود
        if (Auth::check()) {
            return redirect()->route('front.home');
        }

        return view('front.profile.login');
    }

    public function loginSubmit(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // تشخیص اینکه username یا email است
        $loginField = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $credentials = [
            $loginField => $request->username,
            'password' => $request->password,
        ];

        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            return redirect()->route('front.home');
        }

        return back()->with('error', 'اطلاعات ورود صحیح نیست.');
    }
    public function register()
    {
        // اگر کاربر هنوز وارد نشده فرم نمایش داده می‌شود
        if (Auth::check()) {
            return redirect()->route('front.home');
        }

        return view('front.profile.register');
    }
    public function RegisterSubmit(Request $request)
    {

        $request->validate([
            'lastname' => 'required|string|max:50',
            'farstname' => 'required|string|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]+$/'
        ]);

        $user = User::create([
            'lastname' => $request->lastname,
            'farstname' => $request->farstname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('front.home')->with('success', 'ثبت‌نام با موفقیت انجام شد و وارد شدید!');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('front.home');
    }
    public function dashbord()
    {
        return view('front.profile.dashbord');
    }
    public function profile()
    {
        $user = Auth::user();
        return view('front.profile.profile', compact('user'));
    }
    public function ProfileSubmit(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'lastname' => 'required|string|max:255',
            'farstname' => 'required|string|max:255',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        // 🔸 ویرایش فقط نام‌ها
        $user->lastname = $request->lastname;
        $user->farstname = $request->farstname;

        // 🔸 بررسی تغییر رمز عبور
        if ($request->filled('password')) {
            // if (!$request->filled('current_password')) {
            //     return back()->with('error', 'برای تغییر رمز عبور، ابتدا رمز فعلی را وارد کنید.');
            // }

            // // بررسی درستی رمز فعلی
            // if (!Hash::check($request->current_password, $user->password)) {
            //     return back()->with('error', 'رمز فعلی درست نیست.');
            // }

            // رمز جدید هش‌شده و جایگزین می‌شود
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return back()->with('success', 'اطلاعات با موفقیت به‌روزرسانی شد.');
    }
    public function order(Request $request)
    {
        $query = Order::where('user_id', Auth::id());

        // فیلتر جستجو (شماره سفارش یا آدرس یا یادداشت)
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('order_number', 'LIKE', "%{$search}%")
                    ->orWhere('notes', 'LIKE', "%{$search}%")
                    ->orWhere('shipping_address', 'LIKE', "%{$search}%");
            });
        }

        // فیلتر وضعیت
        if ($request->filled('status') && $request->status != 'default') {
            $query->where('status', $request->status);
        }

        // صفحه‌بندی: هر صفحه ۱۰ تا
        $orders = $query->latest()->paginate(3);

        return view('front.profile.order', compact('orders'));
    }
    public function notifications(Request $request)
    {
        $query = auth()->user()->notifications()
            ->withPivot('is_read', 'read_at')
            ->orderByDesc('notifications.created_at');

        // فیلتر جستجو
        if ($search = $request->search) {
            $query->where('title', 'like', "%{$search}%")
                ->orWhere('message', 'like', "%{$search}%");
        }

        // فیلتر وضعیت خوانده/نخوانده
        $status = $request->status;
        if ($status === 'read') {
            $query->wherePivot('is_read', true);
        } elseif ($status === 'unread') {
            $query->wherePivot('is_read', false);
        }

        $notifications = $query->paginate(20); // هر صفحه ۲۰ اعلان

        return view('front.profile.notifications', compact('notifications'));
    }
    public function toggle(Request $request)
    {
        $user = auth()->user();

        // گروهی
        if ($request->has('ids')) {
            foreach ($request->ids as $id) {
                $user->notifications()->updateExistingPivot($id, [
                    'is_read' => $request->action === 'read',
                    'read_at' => $request->action === 'read' ? now() : null,
                ]);
            }
            return back()->with('success', 'وضعیت اعلان‌ها بروزرسانی شد.');
        }

        // ajax برای تک دکمه
        if ($request->ajax() && $request->has('id')) {
            $user->notifications()->updateExistingPivot($request->id, [
                'is_read' => $request->status === 'read',
                'read_at' => $request->status === 'read' ? now() : null,
            ]);
            return response()->json(['success' => true]);
        }
    }
    public function support(Request $request)
    {
        $supports = SupportTicket::query()
            ->with('plan')
            ->when($request->search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'LIKE', "%{$search}%")
                        ->orWhere('id', $search);
                });
            })
            ->when($request->status && $request->status !== 'default', function ($query, $status) {
                $query->whereRaw('REPLACE(LOWER(status), " ", "_") = ?', [strtolower($status)]);
            })
            ->latest()
            ->paginate(20);

        return view('front.profile.support', compact('supports'));
    }
}
