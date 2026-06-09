<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Branch;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\Stock;
use App\Models\User;

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

                $branchId = auth()->user()->branch_id;

                $totalProducts = \App\Models\Product::count();

                $totalStocks = \App\Models\Stock::where(
                    'branch_id',
                    $branchId
                )->sum('stock');

                $todayTransactions = \App\Models\Transaction::where(
                    'branch_id',
                    $branchId
                )->whereDate(
                    'transaction_date',
                    today()
                )->count();

                $todayRevenue = \App\Models\Transaction::where(
                    'branch_id',
                    $branchId
                )->whereDate(
                    'transaction_date',
                    today()
                )->sum('total_price');

                $latestTransactions = \App\Models\Transaction::where(
                    'branch_id',
                    $branchId
                )
                ->latest()
                ->take(5)
                ->get();

                $lowStocks = \App\Models\Stock::with('product')
                    ->where('branch_id', $branchId)
                    ->where('stock', '<=', 10)
                    ->get();

                return view('dashboard.manager', compact(
                    'totalProducts',
                    'totalStocks',
                    'todayTransactions',
                    'todayRevenue',
                    'latestTransactions',
                    'lowStocks'
                ));

            case 'Supervisor':

                $branchId = auth()->user()->branch_id;

                $todayTransactions = Transaction::where(
                    'branch_id',
                    $branchId
                )
                ->whereDate(
                    'transaction_date',
                    today()
                )
                ->count();

                $monthTransactions = Transaction::where(
                    'branch_id',
                    $branchId
                )
                ->whereMonth(
                    'transaction_date',
                    now()->month
                )
                ->count();

                $todayRevenue = Transaction::where(
                    'branch_id',
                    $branchId
                )
                ->whereDate(
                    'transaction_date',
                    today()
                )
                ->sum('total_price');

                $latestTransactions = Transaction::where(
                    'branch_id',
                    $branchId
                )
                ->latest()
                ->take(10)
                ->get();

                $totalCashiers = User::whereHas(
                    'role',
                    fn($q) => $q->where('role_name', 'Kasir')
                )
                ->where(
                    'branch_id',
                    $branchId
                )
                ->count();

                return view('dashboard.supervisor', compact(
                    'todayTransactions',
                    'monthTransactions',
                    'todayRevenue',
                    'latestTransactions',
                    'totalCashiers'
                ));

            case 'Kasir':

                $todayTransactions = Transaction::where(
                    'cashier_id',
                    auth()->id()
                )
                ->whereDate(
                    'transaction_date',
                    today()
                )
                ->count();

                $todayRevenue = Transaction::where(
                    'cashier_id',
                    auth()->id()
                )
                ->whereDate(
                    'transaction_date',
                    today()
                )
                ->sum('total_price');

                $monthTransactions = Transaction::where(
                    'cashier_id',
                    auth()->id()
                )
                ->whereMonth(
                    'transaction_date',
                    now()->month
                )
                ->count();

                $monthRevenue = Transaction::where(
                    'cashier_id',
                    auth()->id()
                )
                ->whereMonth(
                    'transaction_date',
                    now()->month
                )
                ->sum('total_price');

                $latestTransactions = Transaction::where(
                    'cashier_id',
                    auth()->id()
                )
                ->latest()
                ->take(10)
                ->get();

                return view('dashboard.kasir', compact(
                    'todayTransactions',
                    'todayRevenue',
                    'monthTransactions',
                    'monthRevenue',
                    'latestTransactions'
                ));

            case 'Gudang':

                $branchId = auth()->user()->branch_id;

                $totalProducts = Product::count();

                $totalStocks = Stock::where(
                    'branch_id',
                    $branchId
                )->sum('stock');

                $lowStocks = Stock::with('product')
                    ->where('branch_id', $branchId)
                    ->where('stock', '<=', 10)
                    ->get();

                $lowStockCount = $lowStocks->count();

                return view('dashboard.gudang', compact(
                    'totalProducts',
                    'totalStocks',
                    'lowStocks',
                    'lowStockCount'
                ));

            default:
                abort(403);
        }
    }
}