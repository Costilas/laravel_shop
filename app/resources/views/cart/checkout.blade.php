@extends('layout.layout')

@section('title')
    @parent Оформление заказа
@endsection

@section('content')
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Оформление заказа</h1>
                </div>
            </div>
                @if(!empty(session('cart')))
                    <div class="table-responsive cart-table">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Фото:</th>
                                <th scope="col">Название:</th>
                                <th scope="col">Цена:</th>
                                <th scope="col">Кол-во:</th>
                                <th scope="col">Удаление:</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(session('cart') as $product)
                                <tr>
                                    <td><a href="{{route('product.show', ['slug'=>$product['slug']])}}"><img
                                                src="{{ $product['img']}}" alt="{{$product['title']}}"></a>
                                    </td>
                                    <td><a href="{{route('product.show', ['slug'=>$product['slug']])}}">{{$product['title']}}</a></td>
                                    <td>@priceFormat($product['price']) руб.</td>
                                    <td>{{$product['qty']}}</td>
                                    <td><span class="text-danger delete_item" data-action="{{route('cart.delete', ['id' => $product['product_id']])}}">x</span></td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="4" align="right">Товаров: </td>
                                <td id="modal-cart-qty" colspan="4" >{{session('cart_qty')}}</td>
                            </tr>
                            <tr>
                                <td colspan="4" align="right">Сумма:</td>
                                <td id="modal-cart-total" colspan="4">@priceFormat(session('cart_total')) руб.</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    @if ($errors->any())
                        <div class="row">
                            <div class="col-md-8 m-auto">
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if (session()->has('success'))
                        <div class="row">
                            <div class="col-md-8 m-auto">
                                <div class="alert alert-success">
                                    {{session('success')}}
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-8 m-auto">
                            <form method="post" action="{{route('cart.checkout')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email">
                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" id="phone" name="phone">
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" id="address" name="address">
                                </div>
                                <div class="form-group">
                                    <label for="note">Note</label>
                                    <textarea class="form-control" id="note" name="note" maxlength="255" style="resize: none; height: 150px;">

                                    </textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                @else
                    <h4>В корзине ничего нет :(</h4>
                @endif
            </div>
        </div>
    </main>
@endsection
