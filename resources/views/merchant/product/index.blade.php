@extends('merchant.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Product List') }}</div>

                    <div class="card-body">

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Category Name</th>
                                <th>Store Name</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $ind => $product)
                                <tr>
                                    <td>{{$product->name ?? ''}}</td>
                                    <td>{{$product->category->name ?? ''}}</td>
                                    <td>{{$product->store->name ?? ''}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
