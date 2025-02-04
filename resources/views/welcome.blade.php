@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Shops') }}</div>

                    <div class="card-body">

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Shop Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($shops as $shop)
                                    <tr>
                                        <td>
                                            <a href="{{ url($shop->name.env('APP_URL')) }}" target="_blank">{{ $shop->name }}</a>
                                        </td>
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
