<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Stock;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function index()
    {
        return view('reports.index');
    }

    public function transactions(Request $request)
    {
        $transactions = Transaction::query();

        if ($request->start_date && $request->end_date) {

            $transactions->whereBetween(
                'transaction_date',
                [
                    $request->start_date,
                    $request->end_date
                ]
            );
        }

        $transactions = $transactions
            ->latest()
            ->get();

        return view(
            'reports.transactions',
            compact('transactions')
        );
    }

    public function stocks()
    {
        $stocks = Stock::with([
            'product',
            'branch'
        ])->get();

        return view(
            'reports.stocks',
            compact('stocks')
        );
    }

    public function transactionPdf(Request $request)
    {
        $transactions = Transaction::query();

        if ($request->start_date && $request->end_date) {

            $transactions->whereBetween(
                'transaction_date',
                [
                    $request->start_date,
                    $request->end_date
                ]
            );
        }

        $transactions = $transactions
            ->with(['branch', 'cashier'])
            ->get();

        $pdf = Pdf::loadView(
            'reports.pdf.transactions',
            compact('transactions')
        );

        return $pdf->download('laporan-transaksi.pdf');
    }

    public function stockPdf()
    {
        $stocks = Stock::with([
            'product',
            'branch'
        ])->get();

        $pdf = Pdf::loadView(
            'reports.pdf.stocks',
            compact('stocks')
        );

        return $pdf->download(
            'laporan-stok.pdf'
        );
    }
}