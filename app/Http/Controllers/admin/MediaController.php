<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function index()
    {
        $media = Media::latest()->paginate(20);
        return view('admin.media.index', compact('media'));
    }

    public function store(Request $request)
    {
        $request->validate(['file' => 'required|file|max:4000']);

        $file = $request->file('file');
        $path = $file->store('media', 'public');

        Media::create([
            'filename' => $file->getClientOriginalName(),
            'path' => $path,
            'mime_type' => $file->getMimeType(),
            'size' => $file->getSize(),
            'type' => str_starts_with($file->getMimeType(), 'image') ? 'image' : 'file',
        ]);

        return response()->json(['success' => true]);
    }

    public function destroy(Media $medium)
    {
        Storage::disk('public')->delete($medium->path);
        $medium->delete();
        return back()->with('success', 'فایل حذف شد');
    }
}
