<?php
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ReportController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('stocks', StockController::class);
    Route::resource('transactions', TransactionController::class);
});

//report
Route::get('/reports', [ReportController::class, 'index'])
    ->name('reports.index');

Route::get('/reports/transactions', [ReportController::class, 'transactions'])
    ->name('reports.transactions');

Route::get('/reports/stocks', [ReportController::class, 'stocks'])
    ->name('reports.stocks');

Route::get('/reports/transactions/pdf',[ReportController::class, 'transactionPdf'])->name('reports.transactions.pdf');

Route::get('/reports/stocks/pdf', [ReportController::class, 'stockPdf'])->name('reports.stocks.pdf');

Route::get('/reports/transactions/pdf',[ReportController::class, 'transactionPdf'])->name('reports.transactions.pdf');

Route::get('/reports/stocks/pdf',[ReportController::class, 'stockPdf'])->name('reports.stocks.pdf');

// Sebagai testing saja
// Route::middleware(['auth', 'role:Owner'])
//     ->get('/owner', function () {
//         return 'Halaman Owner';
//     });

// Route::middleware(['auth', 'role:Manager'])
//     ->get('/manager', function () {
//         return 'Halaman Manager';
//     });

require __DIR__.'/auth.php';
