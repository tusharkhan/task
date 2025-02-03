@extends('merchant.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Category List') }}</div>

                    <div class="card-body">

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Category Name</th>
                                <th>Store Name</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $ind => $category)
                                <tr>
                                    <td>{{$category->name ?? ''}}</td>
                                    <td>{{$category->shop->name ?? ''}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
