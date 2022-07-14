<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        $links = [
            'create' => [
                'label' => 'Tambah Admin',
                'href' => 'dashboard.user.create'
            ],
            'update' => [
                'href' => 'dashboard.user.edit'
            ],
            'delete' => [
                'label' => 'Tambah Admin',
                'href' => 'dashboard.user.delete'
            ],
        ];

        $data = [
            'users' => $users,
            'links' => $links
        ];

        return view(
            'dashboard.pages.dashboard.user.index',
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
            'dashboard.pages.dashboard.user.create',
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
        $user = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'username' => $request->username,
        ];

        User::create($user);

        return back()
            ->with('callback', [
                'caption' => 'Admin berhasil ditambah',
                'title' => 'Berhasil',
                'icon' => 'success',
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view(
            'dashboard.pages.dashboard.user.edit',
            ['user' => $user]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if ($request->password)
        {
            if ($request->old_password === null) {
                return back()
                    ->with('callback', [
                        'caption' => 'Password lama harus diisi!',
                        'title' => 'Gagal',
                        'icon' => 'error',
                    ]);
            }

            if (Hash::check($request->old_password, $user->password) === false) {
                return back()
                    ->with('callback', [
                        'caption' => 'Password lama tidak benar!',
                        'title' => 'Gagal',
                        'icon' => 'error',
                    ]);
            }

            $user->password = Hash::make($request->password);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;

        $user->update();

        return back()
            ->with('callback', [
                'caption' => 'Admin berhasil diubah',
                'title' => 'Berhasil',
                'icon' => 'success',
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $district = User::find($id);
        $district->delete();

        return back()
            ->with('callback', [
                'caption' => 'Admin berhasil dihapus',
                'title' => 'Berhasil',
                'icon' => 'success',
            ]);
    }
}
