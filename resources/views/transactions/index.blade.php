@extends('layouts.template')

@section('title', 'Transaction List')

@section('content')
    <div class="mt-4 p-5 bg-black text-white rounded">
        <h1 style="text-align: center">All Transactions</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success mt-4">
            {{ session()->get('success') }}
        </div>
    @endif

    <div class="container mt-4">
        <a href="{{ route('transactions.create') }}" class="btn btn-primary btn-lg">Add New Transaction</a><br>
        <br>
        <div class="p-4 mb-3 bg-success bg-gradient text-light rounded">
        <h3 class="mb-3">Balance : Rp. {{$balance}}</h3>
        <h5>Total Income : Rp. {{$totalincome}} | Amount of transaction : {{$countincome}}</h3>
        <h5>Total Expense : Rp. {{$totalexp}} | Amount of transaction : {{$countexp}}</h3>
        </div>
        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-success">
                    <th scope="col">id</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Type</th>
                    <th scope="col">Category</th>
                    <th scope="col">Notes</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($transactions as $transaction)
                    <tr>
                        <th scope="row"><a href="{{ route('transactions.show', $transaction) }}">
                                {{ $transaction->id }}
                        </th>
                        <td>Rp. {{ $transaction->amount }}</td>
                        <td>{{ $transaction->type }}</td>
                        <td>{{ $transaction->category }}</td>
                        <td>{{ Str::limit($transaction->notes, 15, ' ...') }}</td>
                        <td>{{ $transaction->created_at }}</td>
                        <td>{{ $transaction->updated_at }}</td>
                        <td>
                            <a href="{{ route('transactions.edit', $transaction) }}" class="btn btn-primary btn-sm">
                                Edit
                            </a>
                            <form action="{{ route('transactions.destroy', $transaction) }}" method="POST" class="d-inline-block">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure?')">Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">No articles found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {!! $transactions->links() !!}
        </div>
    </div>
@endsection
