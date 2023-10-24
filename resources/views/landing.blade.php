@extends('layouts.template')

@section('title', 'Landing Page')

@section('content')
    @if ($featured)
        <div class="card text-white bg-black bg-gradient my-5">
            <div class="row gx-2 gx-lg-3 align-items-center my-2">
                <div class="p-4 px-5 md-5 mb-1 text-white ">
                    <h1 class="font-weight-light">Transaction : {{ $featured->id }}</h1>
                    <p class="mt-1 mb-3 text-secondary">Updated at : {{ $featured->updated_at }}</p>
                    <p class="lead my-1">Amount : Rp. {{ $featured->amount }}</p>
                    <p class="lead my-1">Type : {{ $featured->type }}</p>
                    <p class="lead my-1">Category : {{ $featured->category }}</p>
                    <p class="my-3">Notes:<br>{{ Str::limit($featured->notes, 100, '...') }}</p>
                    <div class="card-footer"><a class="btn btn-primary mt-4" href="{{ route('transactions.show', $featured) }}">More Info</a></div>
                </div>
            </div>
        </div>
    @endif

    <div class="card text-white bg-secondary my-5 py-4 text-center">
        <div class="card-body">
            <p class="text-white m-0">Below is information about your latest transaction!</p>
        </div>
    </div>

    <div class="row gx-4 gx-lg-5">
        @forelse($transactions as $transaction)
            <div class="col-md-4 mb-5">
                <div class="card h-100">
                    <div class="card-body">
                        <h2 class="card-header">Type : {{ $transaction->type }}</h2>
                        <p class="card-body mb-0" style="color:gray">{{ $transaction->category }}<br>ID : {{ $transaction->id }}</p>
                        <p class="px-3 mb-0"><b>Amount :</b></p>
                        <p class="px-3" style="font-size:20px"><b>Rp. {{ $transaction->amount }}</b></p>
                        <p class="px-3">{{ Str::limit($transaction->notes, 50, '...') }}</p>
                    </div>
                    <div class="card-footer"><a class="btn btn-primary btn-sm"
                            href="{{ route('transactions.show', $transaction) }}">More Info</a></div>
                </div>
            </div>
        @empty
            <div class="col-md-12">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <h2 class="card-text mb-auto">No transaction found.</h2>
                    </div>
                </div>
            </div>
        @endforelse
        {{ $transactions->links() }}
    </div>
@endsection
