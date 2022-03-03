@extends('layout.layout')


@section('title') @parent {{$product->title}}
@endsection

@section('content')
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1>{{$product->title}}</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <img src="{{$product->getImage()}}" alt="{{$product->title}}" class="img-thumbnail">
                </div>
                <div class="col-sm-8">
                    <ul>
                        <li>Категория: <a
                                href="{{route('category.show', ['slug' => $product->category->slug])}}">{{$product->category->title}}</a>
                        </li>
                        <li>Статус товара: <i class="{{$product->status->icon}}"></i> {{$product->status->title}}</li>
                        <li>Цена:
                            <span class="text-center">
                                @priceFormat($product->price) руб.
                                @if($product->old_price)
                                    <small>
                                        <del>@priceFormat($product->old_price) руб.</del>
                                    </small>
                                @endif
                            </span>
                        </li>
                    </ul>

                    <p>{{$product->content}}</p>

                    @if($product->status->id === 2)
                        <a href="#" class="btn btn-info">
                            <i class="bi bi-envelope"></i> Сообщить о поступлении
                        </a>
                    @else
                        <form action="{{route('cart.add')}}" method="post" class="addtocart">
                            @csrf
                            <div class="input-group w-50 mr-auto">
                                <input type="text" class="form-control" name="qty" value="1">
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                <div class="input-group-append">
                                    <button class="btn btn-primary cart-addtocart" type="submit">
                                        <i class="bi bi-basket3"></i> В корзину
                                    </button>
                                </div>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection
