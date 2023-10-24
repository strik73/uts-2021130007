<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::orderBy('created_at','desc')->paginate(25); //untuk menampilkan terbalik menurut cretaed_at
        $totalincome = Transaction::where('type','income')->sum('amount');
        $totalexp = Transaction::where('type','expense')->sum('amount');
        $countincome = Transaction::where('type','income')->count();
        $countexp = Transaction::where('type','expense')->count();
        $balance = $totalincome - $totalexp;

        return view('transactions.index',compact('transactions'),compact('totalexp','totalincome','balance','countincome','countexp'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('transactions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric',
            'type' => 'required|string',
            'category' => 'required|string',
            'notes' => 'required|string',
        ]);

        $transaction = Transaction::create([
            'amount' => $validated['amount'],
            'type' => $validated['type'],
            'category' => $validated['category'],
            'notes' => $validated['notes'],
        ]);

        return redirect()->route('transactions.index')->with('success', 'Transaction added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        return view('transactions.show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        return view('transactions.edit', compact('transaction'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric',
            'type' => 'required|string',
            'category' => 'required|string',
            'notes' => 'required|string',
        ]);

        $transaction->update([
            'amount' => $validated['amount'],
            'type' => $validated['type'],
            'category' => $validated['category'],
            'notes' => $validated['notes'],

        ]);
        return redirect()->route('transactions.index')->with('success', 'Transaction updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()->route('transactions.index')->with('success', 'Article deleted successfully.');
    }
}
