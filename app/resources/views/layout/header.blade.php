<header class="header">
    <div class="container">
        <div class="header_content d-flex justify-content-between align-items-center">
            <div class="logo" style="width: auto; font-size: 20px">
                <i class="bi-x-diamond"></i>
                <p>Learning shop</p>
            </div>
            <div class="nav_block">
                <ul class="nav">
                    <a href="{{route('home')}}"><li class="nav-item">Home</li></a>
                    @foreach($categories as $category)
                        <a href="{{route('category.show', ['slug' => $category->slug])}}"><li class="nav-item">{{$category->title}}</li></a>
                    @endforeach
                    <li class="nav-item">
                        <button onclick="getCart('{{route('cart.show')}}')" type="button" class="btn btn-primary">
                            Корзина <span class="badge badge-light mini-cart-qty">{{session('cart_qty') ?? 0 }} </span>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
