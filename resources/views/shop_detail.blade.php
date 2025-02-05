@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
                @foreach($products as $product)
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <p>Product : {{$product->name}}</p>
                                <hr>
                                <p>Category : {{ $product->category->name }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
        </div>
    </div>

@endsection
