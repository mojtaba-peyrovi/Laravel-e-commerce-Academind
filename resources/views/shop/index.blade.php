@extends('layouts.master')
@section('title')
Mojiway Shopping Cart
@endsection
@section('content')
    @foreach ($products->chunk(3) as $productChunk)
        <div class="row">
            @foreach ($productChunk as $product)
                <div class="col-sm-6 col-md-4">
                  <div class="thumbnail">
                    <img src="{{ $product->imagePath }}" alt="..." class="img-responsive">
                    <div class="caption">
                           <h3>{{ $product->title }}<span>${{ $product->price }}</span></h3>
                      <p>{{ substr($product->description,0,300) }}{{ strlen($product->description) > 300 ? "..." : "" }}</p>
                      <div class="clearfix">
                          <a href="{{ route('product.addToCart', ['id'=>$product->id]) }}" class="btn btn-primary" role="button"><i class="fas fa-cart-plus"></i> Add to Cart</a> <a href="#" class="btn btn-default pull-right" role="button"><i class="fas fa-info"></i> More Info</a>
                      </div>
                    </div>
                  </div>
                </div>
            @endforeach
    @endforeach
@endsection
