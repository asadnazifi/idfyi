<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('title', 'like', "%{$search}%");
        }

        $products = $query->latest()->paginate(15);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'type' => 'required|in:physical,course,service',
            'price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0',
            'description' => 'nullable|string',
            'short_content' => 'string',
            'category_id' => 'nullable|exists:categories,id',
            'photo' => 'nullable|file'
        ]);
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('media', 'public');
        }
        $product = Product::create($data);
        return redirect()->route('admin.products.index')->with('success', 'محصول با موفقیت ثبت شد.');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

    $data = $request->validate([
        'title'         => 'required|string',
        'type'          => 'required|in:physical,course,service',
        'price'         => 'required|numeric|min:0',
        'sale_price'    => 'nullable|numeric|min:0',
        'description'   => 'nullable|string',
        'short_content' => 'nullable|string',
        'category_id'   => 'nullable|exists:categories,id',
        'photo'         => 'nullable|file|image|max:2048',
    ]);

    // اگر عکس جدید بارگذاری نشده، همون عکس قبلی بمونه
    if ($request->hasFile('photo')) {
        // اگر عکس جدید فرستاده شده بود، عکس جدید ذخیره کن
        $data['photo'] = $request->file('photo')->store('media', 'public');
    } else {
        // اگر عکس جدیدی نیومده، مقدارش رو از محصول فعلی بردار
        $data['photo'] = $product->photo;
    }

    $product->update($data);

        return redirect()->route('admin.products.index')->with('success', 'محصول با موفقیت ویرایش شد.');
    }

    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'محصول حذف شد.');
    }
}

