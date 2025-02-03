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

                        <form action="{{ route('merchant.category.store') }}" method="post">
                            @csrf

                            <div class="mb-3">
                                <label  class="form-label">Select Store</label>
                                <select class="form-select @error('shop_id') is-invalid @enderror"  name="shop_id" >
                                    <option selected disabled>Select Store</option>
                                    @foreach($stores as $store)
                                        <option @if(old('shop_id') == $store->id ) selected @endif value="{{$store->id}}">{{ $store->name }}</option>
                                    @endforeach
                                </select>
                                @error('shop_id')
                                <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Category Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="formGroupExampleInput" placeholder="Store Name" value="{{old('name')}}">
                                @error('name')
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
