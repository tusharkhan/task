@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Merchants') }}</div>

                    <div class="card-body">

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Merchant Name</th>
                                    <th>Merchant Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($merchants as $merchant)
                                    <tr>
                                        <td>{{$merchant->name ?? ''}}</td>
                                        <td>{{$merchant->email ?? ''}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $merchants->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
