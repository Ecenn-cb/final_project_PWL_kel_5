<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role->role_name;

        switch ($role) {
            case 'Owner':
                return view('dashboard.owner');

            case 'Manager':
                return view('dashboard.manager');

            case 'Supervisor':
                return view('dashboard.supervisor');

            case 'Kasir':
                return view('dashboard.kasir');

            case 'Gudang':
                return view('dashboard.gudang');

            default:
                abort(403);
        }
    }
}