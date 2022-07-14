<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Models\Clinic;
use App\Models\User;
use App\Models\Blog;
use App\Models\District;
use Carbon\Carbon;
use DateTime;

class DashboardController extends Controller
{
    public function index()
    {
        $admins = User::count();
        $blogs = Blog::count();
        $districts = District::count();
        $clinics = Clinic::count();

        $data = [
            'counts' => [
                [
                    'icon' => 'far fa-user',
                    'classes' => 'bg-primary',
                    'value' => $admins,
                    'label' => 'Jumlah Admin'
                ],
                [
                    'icon' => 'far fa-newspaper',
                    'classes' => 'bg-warning',
                    'value' => $blogs,
                    'label' => 'Jumlah Blog'
                ],
                [
                    'icon' => 'fas fa-hospital',
                    'classes' => 'bg-danger',
                    'value' => $clinics,
                    'label' => 'PUSKESMAS'
                ],
                [
                    'icon' => 'fas fa-map-marked-alt',
                    'classes' => 'bg-info',
                    'value' => $districts,
                    'label' => 'Kecamatan'
                ],
            ]
        ];

        return view('dashboard.pages.dashboard.index', $data);
    }
}
