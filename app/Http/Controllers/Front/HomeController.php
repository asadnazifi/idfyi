<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public function index(){
    $ArticlesLists = Article::latest()->take(6)->get();

        return View('front.home',compact('ArticlesLists'));
    }
    public function contact()  
    {
        return view('front.contact');    
    }
}
