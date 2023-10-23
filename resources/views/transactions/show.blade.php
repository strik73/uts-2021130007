@extends('layouts.template')

@section('title', $transaction->id)

@section('content')
    <article class="blog-post my-4">
        <h1 class="display-5 fw-bold">Transaction : {{ $transaction->id }}</h1>
        <p class="blog-post-meta" style="color:gray">Updated at : {{ $transaction->updated_at }}</p>
        <p>Amount : {{ $transaction->amount }}</p>
        <p>Type : {{ $transaction->type }}</p>
        <p>Category : {{ $transaction->category }}</p>
        <p>Notes :<br>{{ $transaction->notes }}</p>
    </article>
@endsection
