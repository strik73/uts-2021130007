@extends('layouts.template')

@section('title', $transaction->id)

@section('content')
    <article class="blog-post my-5">
        <h1 class="display-5 fw-bold">Transaction : {{ $transaction->id }}</h1>
        <p class="blog-post-meta" style="color:gray">Updated at : {{ $transaction->updated_at }}</p>
        <p class="mb-0">Amount : {{ $transaction->amount }}</p>
        <p class="mb-0">Type : {{ $transaction->type }}</p>
        <p>Category : {{ $transaction->category }}</p>
        <p>Notes :<br>{{ $transaction->notes }}</p>
    </article>
@endsection
