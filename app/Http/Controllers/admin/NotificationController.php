<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::orderByDesc('id')->paginate(20);

        return view('admin.notifitions.index', compact('notifications'));
    }
    public function create()
    {
        $users = User::all(); // کاربران برای انتخاب گیرنده
        return view('admin.notifitions.create', compact('users'));
    }

    /**
     * نمایش فرم ویرایش اعلان موجود.
     */
    public function edit($id)
    {
        $notification = Notification::findOrFail($id);
        $users = User::all();
        return view('admin.notifitions.edit', compact('notification', 'users'));
    }

    /**
     * بروزرسانی اعلان و بازگشت به لیست.
     */
    public function update(Request $request, $id)
    {
        $notification = Notification::findOrFail($id);

        $notification->update([
            'title' => $request->title,
            'message' => $request->message,
            'link' => $request->link,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('admin.notifition.index')->with('success', 'اعلان با موفقیت ویرایش شد.');
    }

    /**
     * حذف اعلان.
     */
    public function destroy($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->delete();

        return redirect()->route('admin.notifition.index')->with('success', 'اعلان حذف شد.');
    }
    public function store(Request $request)
    {
        // اعتبارسنجی ورودی‌ها
        $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string',
            'link' => 'nullable|url',
            'user_id' => 'nullable|exists:users,id', // می‌تواند خالی باشد برای اعلان عمومی
        ]);

        // ایجاد اعلان جدید در جدول notifications
        $notification = Notification::create([
            'title' => $request->title,
            'message' => $request->message,
            'link' => $request->link,
            'user_id' => $request->user_id, // اگر null باشد یعنی برای همه کاربران
        ]);

        // اگر اعلان عمومی است (یعنی user_id خالی است)
        if ($request->user_id === null) {
            // برای همه کاربران یک رکورد در notification_user ایجاد کن
            $users = User::all();
            foreach ($users as $user) {
                $notification->users()->attach($user->id, [
                    'is_read' => false,
                    'read_at' => null,
                ]);
            }
        } else {
            // فقط برای همان کاربر خاص رکورد خوانده‌شدن بساز
            $notification->users()->attach($request->user_id, [
                'is_read' => false,
                'read_at' => null,
            ]);
        }

        // بازگشت همراه پیام موفقیت
        return redirect()->route('admin.notifition.index')
            ->with('success', 'اعلان جدید با موفقیت ایجاد شد.');
    }
}
