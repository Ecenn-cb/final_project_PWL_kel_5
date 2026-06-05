<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Branch;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\Stock;

class DashboardController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role->role_name;

        switch ($role) {

            case 'Owner':

                $totalBranches = Branch::count();

                $totalProducts = Product::count();

                $totalTransactions = Transaction::count();

                $totalRevenue = Transaction::sum('total_price');

                $latestTransactions = Transaction::latest()
                    ->take(5)
                    ->get();

                $lowStocks = Stock::with(['product', 'branch'])
                    ->where('stock', '<=', 10)
                    ->get();

                return view('dashboard.owner', compact(
                    'totalBranches',
                    'totalProducts',
                    'totalTransactions',
                    'totalRevenue',
                    'latestTransactions',
                    'lowStocks'
                ));

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