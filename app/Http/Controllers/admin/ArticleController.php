<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $query = Article::query();

        if ($request->filled('search')) {
            $query->where('title', 'like', "%{$request->search}%");
        }

        $articles = $query->latest()->paginate(20);
        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.articles.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'content' => 'nullable|string',
            'short_content' => 'string',
            'thumbnail' => 'nullable|image|max:2048',
            'is_published' => 'boolean'
        ]);

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('articles', 'public');
        }

        $data['slug'] = Str::slug($data['title']);
        $data['user_id'] = auth()->id();
        if (!empty($data['is_published'])) {
            $data['published_at'] = now();
        }

        Article::create($data);
        return redirect()->route('admin.articles.index')->with('success', 'مقاله با موفقیت ایجاد شد.');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $categories = Category::where('type', 'blog')->get();
        return view('admin.articles.edit', compact('article', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'content' => 'nullable|string',
            'thumbnail' => 'nullable|image|max:2048',
            'is_published' => 'boolean'
        ]);

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('articles', 'public');
        }

        $data['slug'] = Str::slug($data['title']);
        if (!empty($data['is_published']) && !$article->published_at) {
            $data['published_at'] = now();
        }

        $article->update($data);
        return redirect()->route('admin.articles.index')->with('success', 'مقاله با موفقیت ویرایش شد.');
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        if ($article->thumbnail && file_exists(storage_path('app/public/' . $article->thumbnail))) {
            unlink(storage_path('app/public/' . $article->thumbnail));
        }
        $article->delete();

        return redirect()->back()->with('success', 'مقاله حذف شد.');
    }
}

