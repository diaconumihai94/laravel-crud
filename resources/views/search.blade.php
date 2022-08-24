@extends('layout')


@section('content')

    <a class="btn btn-primary" href="{{ url('/products') }}"> Back</a>
    <br>

    @if($products->isNotEmpty())
        @foreach ($products as $product)
            <div class="product-list">
                <p>{{ $product->product_name }}</p>
                <p>{{ $product->product_description }}</p>
                <p>{{ $product->product_status }}</p>
                <p>{{ $product->product_price }}</p>
                <p>{{ $product->product_code }}</p>
            </div>
        @endforeach
    @else 
        <div>
            <h2>No posts found</h2>
        </div>
    @endif


@endsection
