<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(10);
        $links = [
            'create' => [
                'label' => 'Tambah Kategori',
                'href' => 'dashboard.category.create'
            ],
            'update' => [
                'href' => 'dashboard.category.edit'
            ],
            'delete' => [
                'label' => 'Tambah Kategori',
                'href' => 'dashboard.category.delete'
            ],
        ];

        $data = [
            'categories' => $categories,
            'links' => $links
        ];

        return view(
            'dashboard.pages.dashboard.category.index',
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
            'dashboard.pages.dashboard.category.create',
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
        $get = Category::get();
        foreach($get as $i){
            $id = $i->id;

        }
        //dd($id);
        $category = [
            'id' => $id+1,
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ];
        //dd($category);

        Category::create($category);

        return back()
            ->with('callback', [
                'caption' => 'Kategori berhasil ditambah',
                'title' => 'Berhasil',
                'icon' => 'success',
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $get = Category::find($id);

        $category = [
            'id' => $get->id,
            'name' => $get->name
        ];

        return view(
            'dashboard.pages.dashboard.category.edit',
            [
                'category' => $category
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        $category->name = $request->name;
        $category->slug = Str::slug($request->name);

        $category->update();

        return back()
            ->with('callback', [
                'caption' => 'Kategori berhasil diubah',
                'title' => 'Berhasil',
                'icon' => 'success',
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $district = Category::find($id);
        $district->delete();

        return back()
            ->with('callback', [
                'caption' => 'Kategori berhasil dihapus',
                'title' => 'Berhasil',
                'icon' => 'success',
            ]);
    }
}
