<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Product;
use App\Models\Stock;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::latest()->get();

        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        $products = Product::all();

        $role = auth()->user()->role->role_name;

        if ($role == 'Owner') {

            $branches = Branch::all();

            return view(
                'transactions.create',
                compact('products', 'branches')
            );
        }

        return view(
            'transactions.create',
            compact('products')
        );
    }

    public function store(Request $request)
    {
        // Validasi berdasarkan role
        if (auth()->user()->role->role_name == 'Owner') {

            $request->validate([
                'branch_id' => 'required|exists:branches,id',
                'product_id' => 'required|exists:products,id',
                'qty' => 'required|integer|min:1',
            ]);

            $branchId = $request->branch_id;

        } else {

            $request->validate([
                'product_id' => 'required|exists:products,id',
                'qty' => 'required|integer|min:1',
            ]);

            $branchId = auth()->user()->branch_id;
        }

        DB::beginTransaction();

        try {

            $product = Product::findOrFail(
                $request->product_id
            );

            $stock = Stock::where(
                'product_id',
                $request->product_id
            )
            ->where(
                'branch_id',
                $branchId
            )
            ->first();

            if (!$stock) {

                DB::rollBack();

                return back()
                    ->withInput()
                    ->with(
                        'error',
                        'Data stok tidak ditemukan'
                    );
            }

            if ($stock->stock < $request->qty) {

                DB::rollBack();

                return back()
                    ->withInput()
                    ->with(
                        'error',
                        'Stok tidak mencukupi'
                    );
            }

            $subtotal =
                $product->price *
                $request->qty;

            $transaction = Transaction::create([

                'invoice_number' =>
                    'INV-' . now()->format('YmdHis'),

                'branch_id' =>
                    $branchId,

                'cashier_id' =>
                    auth()->id(),

                'total_price' =>
                    $subtotal,

                'transaction_date' =>
                    now(),
            ]);

            TransactionDetail::create([

                'transaction_id' =>
                    $transaction->id,

                'product_id' =>
                    $product->id,

                'qty' =>
                    $request->qty,

                'price' =>
                    $product->price,

                'subtotal' =>
                    $subtotal,
            ]);

            $stock->decrement(
                'stock',
                $request->qty
            );

            DB::commit();

            return redirect()
                ->route('transactions.index')
                ->with(
                    'success',
                    'Transaksi berhasil disimpan'
                );

        } catch (\Exception $e) {

            DB::rollBack();

            return back()
                ->withInput()
                ->with(
                    'error',
                    $e->getMessage()
                );
        }
    }

    public function show(Transaction $transaction)
    {
        $transaction->load([
            'details.product',
            'branch',
            'cashier'
        ]);

        return view(
            'transactions.show',
            compact('transaction')
        );
    }
}