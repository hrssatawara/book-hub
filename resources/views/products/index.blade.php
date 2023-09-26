@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Plans</div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($products as $product)
                                <li class="list-group-item clearfix">
                                    <div class="pull-left">
                                        <h5>{{ $product->name }}</h5>
                                        <h5>${{ number_format($product->cost, 2) }} monthly</h5>
                                        <h5>{{ $product->description }}</h5>
                                        @if(!auth()->user()->subscribedToProduct($product->stripe_product, $product->slug))
                                            <a href="{{route('products.show',[$product])}}"
                                               class="btn btn-outline-dark pull-right">Choose</a>
                                        @endif
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
