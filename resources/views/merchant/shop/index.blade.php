@extends('merchant.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Store List') }}</div>

                    <div class="card-body">

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Store Name</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($shops as $ind => $shop)
                                <tr>
                                    <td>{{$shop->name ?? ''}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $shops->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
