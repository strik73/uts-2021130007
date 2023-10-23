@extends('layouts.template')

@section('title', 'Update Transaction')

@section('content')
    <div class="mt-4 p-5 bg-black text-white rounded">
        <h1>Edit Transaction</h1>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger mt-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row my-5">
        <div class="col-12 px-5">
            <form action="{{ route('transactions.update', $transaction) }}" method="POST" enctype="multipart/form-data">
               @method('PUT')
                @csrf
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="amount" class="form-label">Amount</label>
                    <input type="number" class="form-control" id="amount" name="amount" value="{{ old('amount', $transaction->amount) }}">
                </div>

                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="type" class="form-label">Type</label>
                    <select class="form-control" id="type" name="type" value="{{ old('type', $transaction->type) }}">
                        <option value="income">Income</option>
                        <option value="expense">Expense</option>
                      </select>
                </div>

                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-control" id="category" name="category" value="{{ old('category', $transaction->category) }}">
                        <script>
                            const type = document.getElementById("type");
                            const category = document.getElementById("category");

                            const optionsType = {
                              income: ["Wage", "Bonus", "Gift"],
                              expense: ["Foods & Drinks", "Shopping","Charity","Housing","Insurance","Taxes","Transportation"],
                            };

                            function updateCategory() {
                              const selectedValue = type.value;
                              category.innerHTML = "";

                              optionsType[selectedValue].forEach((option) => {
                                const optionElement = document.createElement("option");
                                optionElement.text = option;
                                optionElement.value = option;
                                category.add(optionElement);
                              });
                            }

                            type.addEventListener("change", updateCategory);

                            updateCategory();
                          </script>
                    </select>
                </div>

                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="notes" class="form-label">Notes</label>
                    <textarea class="form-control" rows="10" name="notes">{{ old('notes', $transaction->notes) }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Save</button>
            </form>
        </div>
    </div>
@endsection
