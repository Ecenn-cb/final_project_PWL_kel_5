<?php

namespace App\Http\Controllers;

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

        return view('transactions.create', compact('products'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        try {

            $product = Product::findOrFail($request->product_id);

            $stock = Stock::where(
                'product_id',
                $request->product_id
            )->where(
                'branch_id',
                auth()->user()->branch_id
            )->first();

            if (!$stock || $stock->stock < $request->qty) {
                return back()->with(
                    'error',
                    'Stok tidak mencukupi'
                );
            }

            $subtotal =
                $product->price *
                $request->qty;

            $transaction = Transaction::create([
                'invoice_number' =>
                    'INV-' . time(),

                'branch_id' =>
                    auth()->user()->branch_id,

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
                    'Transaksi berhasil'
                );

        } catch (\Exception $e) {

            DB::rollback();

            return back()->with(
                'error',
                $e->getMessage()
            );
        }
    }
}