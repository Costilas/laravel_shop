@extends('layout.layout')

@section('title')
    @parent {{$title}}
@endsection

@section('content')
    <main>
        <div class="container">
            <div class="product_block">
                @foreach($products as $product)
                    <div class="card">
                        <div class="promotion_block">
                            @if($product->sale)
                                <div class="sale">
                                    <div>SALE</div>

                                </div>
                            @endif
                            @if($product->hit)
                                <div class="hit">
                                    <div>HIT</div>
                                </div>
                            @endif
                        </div>
                        <img src="{{$product->getImage()}}" class="card-img-top" alt="...">
                        <div class="card-body d-flex flex-column justify-content-between">

                                <h5 class="card-title">
                                    <a href="{{route('product.show', ['slug'=>$product->slug])}}">
                                        {{$product->title}}
                                    </a>
                                </h5>

                            <p class="card-text">{{$product->content}}</p>
                            <div class="d-flex justify-content-around">
                                <p class="price">{{$product->price}} руб.</p>
                                @if($product->old_price)
                                    <p class="price"><small><del>{{$product->old_price}} руб.</del></small></p>
                                @endif
                            </div>
                            @if($product->status->id === 2)
                                <a href="#" class="btn btn-info">
                                    <i class="bi bi-envelope"></i> Сообщить о поступлении
                                </a>
                            @else
                                <a href="#" class="btn btn-primary">
                                    <i class="bi bi-basket3"></i> В корзину
                                </a>
                            @endif
                            <div class="status">
                                <i class="{{$product->status->icon}}"></i> {{$product->status->title}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{$products->links()}}

        </div>
    </main>
@endsection
