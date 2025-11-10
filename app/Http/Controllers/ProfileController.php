<?php

namespace App\Http\Controllers;

use App\Models\Order;
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
    public function order(){
        $orders =  Order::paginate(25);
        return view('front.profile.order',compact('orders'));
    }



}
