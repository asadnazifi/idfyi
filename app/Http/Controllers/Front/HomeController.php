<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public function index()
    {
        $ArticlesLists = Article::latest()->take(6)->get();
        $plans = Product::where('type', 'service')->take(6)->get();

        return View('front.home', compact('ArticlesLists', 'plans'));
    }
    public function contact()
    {
        return view('front.contact');
    }
    public function show($slug)
    {
        $plan = Product::where('type', 'service')
            ->where('slug', $slug)
            ->firstOrFail();

        return view('front.single', compact('plan'));
    }

}
