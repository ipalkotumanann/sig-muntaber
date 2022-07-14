<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use Illuminate\Support\Str;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::with('category')
                    ->paginate(10);


                    $links = [
            'create' => [
                'label' => 'Tambah Berita',
                'href' => 'dashboard.blog.create'
            ],
            'update' => [
                'href' => 'dashboard.blog.edit'
            ],
            'delete' => [
                'href' => 'dashboard.blog.delete'
            ],
        ];

        $props = [
            'title',
            ['category', 'name'],
            'created_at',
            'view'
        ];

        $data = [
            'blogs' => $blogs,
            'links' => $links,
            'props' => $props
        ];

        return view(
            'dashboard.pages.dashboard.blog.index',
            $data
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();

        return view(
            'dashboard.pages.dashboard.blog.create',
            ['categories' => $categories]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file       = $request->file('image');
        $filename   = $file->getClientOriginalName();

        $file->move(public_path('/img/news'), $filename);
        // $path = $file->storeAs('public/blogs', $filename);

        $blog = [
            'categories_id' => $request->category,
            'title' => $request->title,
            'image' => $filename,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
        ];

        Blog::create($blog);

        return back()
            ->with('callback', [
                'caption' => 'Berita berhasil ditambah',
                'title' => 'Berhasil',
                'icon' => 'success',
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::find($id);
        $categories = Category::get();

        return view(
            'dashboard.pages.dashboard.blog.edit',
            [
                'blog' => $blog,
                'categories' => $categories
            ],
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $blog = Blog::find($id);

        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);
        $blog->categories_id = $request->category;
        $blog->content = $request->content;

        if ($request->hasFile('image')) {
            $file       = $request->file('image');
            $filename   = $file->getClientOriginalName();

            $file->move(public_path('/img/news'), $filename);
            // $path = $file->storeAs('public/blogs', $filename);

            $blog->image = $filename;
        }

        $blog->update();

        return back()
            ->with('callback', [
                'caption' => 'Blog berhasil diubah',
                'title' => 'Berhasil',
                'icon' => 'success',
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);
        $blog->delete();

        return back()
            ->with('callback', [
                'caption' => 'Blog berhasil dihapus',
                'title' => 'Berhasil',
                'icon' => 'success',
            ]);
    }
}
