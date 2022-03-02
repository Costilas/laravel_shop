@if(!empty(session('cart')))
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Фото:</th>
                <th scope="col">Название:</th>
                <th scope="col">Цена:</th>
                <th scope="col">Кол-во:</th>
            </tr>
            </thead>
            <tbody>
            @foreach(session('cart') as $product)
                <tr>
                    <td><a href="{{route('product.show', ['slug'=>$product['slug']])}}"><img
                                src="{{ $product['img']}}" alt="{{$product['title']}}"></a>
                    </td>
                    <td><a href="{{route('product.show', ['slug'=>$product['slug']])}}">{{$product['title']}}</a></td>
                    <td>{{$product['price']}}</td>
                    <td>{{$product['qty']}}</td>
                </tr>
            @endforeach
            <tr>
                <td id="modal-cart-qty" colspan="4">Товаров: {{session('cart_qty')}}</td>
            </tr>
            <tr>
                <td id="modal-cart-total" colspan="4">Сумма: {{session('cart_total')}} руб.</td>
            </tr>
            </tbody>
        </table>
    </div>
@else
    <h4>В корзине ничего нет :(</h4>
@endif
