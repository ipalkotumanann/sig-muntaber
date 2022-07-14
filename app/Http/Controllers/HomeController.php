<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index($slug = 'beranda')
    {
        if ($slug == 'beranda')
        {
            $blogs = Blog::with('category')
                    ->limit(3)
                    ->get();

            return view('home.pages.home', ['blogs' => $blogs]);
        }

        $page = Page::where('slug', $slug)
                    ->first();

        return view('home.pages.page', ['page' => $page]);
    }

    public function stats()
    {
        return view('home.pages.stats');
    }
}
