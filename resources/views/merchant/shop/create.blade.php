@extends('merchant.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Create Store') }}</div>

                    <div class="card-body">

                        @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form action="{{ route('merchant.store.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Store Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="formGroupExampleInput" placeholder="Store Name" value="{{old('name')}}">
                                @error('name')
                                <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput2" class="form-label">Store Password</label>
                                <input type="password" name="password" class="form-control @error('email') is-invalid @enderror" id="formGroupExampleInput2" placeholder="Store Password">
                                @error('password')
                                <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-success">Create</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
