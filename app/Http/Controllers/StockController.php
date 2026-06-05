<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Branch;
use App\Models\Product;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index()
    {
        $stocks = Stock::with(['branch', 'product'])->get();

        return view('stocks.index', compact('stocks'));
    }

    public function create()
    {
        $branches = Branch::all();
        $products = Product::all();

        return view('stocks.create', compact(
            'branches',
            'products'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'branch_id' => 'required',
            'product_id' => 'required',
            'stock' => 'required|integer|min:0'
        ]);

        Stock::create($request->all());

        return redirect()
            ->route('stocks.index')
            ->with('success', 'Stok berhasil ditambahkan');
    }

    public function edit(Stock $stock)
    {
        $branches = Branch::all();
        $products = Product::all();

        return view('stocks.edit', compact(
            'stock',
            'branches',
            'products'
        ));
    }

    public function update(Request $request, Stock $stock)
    {
        $request->validate([
            'branch_id' => 'required',
            'product_id' => 'required',
            'stock' => 'required|integer|min:0'
        ]);

        $stock->update($request->all());

        return redirect()
            ->route('stocks.index')
            ->with('success', 'Stok berhasil diubah');
    }

    public function destroy(Stock $stock)
    {
        $stock->delete();

        return redirect()
            ->route('stocks.index')
            ->with('success', 'Stok berhasil dihapus');
    }
}