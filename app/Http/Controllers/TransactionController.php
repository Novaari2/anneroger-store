<?php

namespace App\Http\Controllers;

use App\Http\Resources\TransactionListResource;
use App\Http\Resources\TransactionResource;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin')->except('show');
    }

    public function index()
    {
        $transactions = Transaction::query()
            ->with(['customer','details.variation.product'])
            ->orderBy('order_status')
            ->paginate();

        return inertia('Transactions/Index', [
            'transactions' => TransactionListResource::collection($transactions)->additional([
                'meta' => ['has_pages' => $transactions->hasPages()],
            ])
        ]);
    }

    public function update(Transaction $transaction, Request $request)
    {
        $transaction->update($request->only('order.status'));

        return back();
    }

    public function show(Transaction $transaction)
    {
        return inertia('Transactions/Show', [
            'transaction' => new TransactionResource($transaction->load('details.variation')),
        ]);
    }
}
