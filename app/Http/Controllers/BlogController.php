<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index($slug = null)
    {
        if ($slug) {
            $blog = Blog::where('slug', $slug)
                ->first();

            $this->viewed($blog->id);

            return view('home.pages.blog-read', ['blog' => $blog]);
        }

        $blogs = Blog::with('category')
                    ->paginate(6);

        return view('home.pages.blog', ['blogs' => $blogs]);
    }

    public function viewed($id)
    {
        $blog = Blog::find($id);
        $blog->view += 1;
        $blog->update();
    }
}
