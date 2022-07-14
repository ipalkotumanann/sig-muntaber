<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::paginate(10);
        $links = [
            'create' => [
                'label' => 'Tambah Halaman',
                'href' => 'dashboard.page.create'
            ],
            'update' => [
                'href' => 'dashboard.page.edit'
            ],
            'delete' => [
                'label' => 'Tambah Halaman',
                'href' => 'dashboard.page.delete'
            ],
        ];

        $data = [
            'pages' => $pages,
            'links' => $links
        ];

        return view(
            'dashboard.pages.dashboard.page.index',
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
        return view(
            'dashboard.pages.dashboard.page.create',
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
        $page = [
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'content' => $request->content,
        ];

        Page::create($page);

        return back()
            ->with('callback', [
                'caption' => 'Halaman berhasil ditambah',
                'title' => 'Berhasil',
                'icon' => 'success',
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Page::find($id);

        return view(
            'dashboard.pages.dashboard.page.edit',
            ['page' => $page]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $page = Page::find($id);

        $page->name = $request->name;
        $page->slug = Str::slug($request->name);
        $page->content = $request->content;

        $page->update();

        return back()
            ->with('callback', [
                'caption' => 'Halaman berhasil diubah',
                'title' => 'Berhasil',
                'icon' => 'success',
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Page::find($id);
        $page->delete();

        return back()
            ->with('callback', [
                'caption' => 'Halaman berhasil dihapus',
                'title' => 'Berhasil',
                'icon' => 'success',
            ]);
    }
}
