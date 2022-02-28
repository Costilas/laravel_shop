@extends('layout.layout')

@section('content')
    <main>
        <div class="container">
            <div class="product_block">
                <div class="card">
                    <div class="promotion_block">
                        <div class="sale">
                            <div>SALE</div>
                        </div>
                        <div class="hit">
                            <div>HIT</div>
                        </div>
                    </div>
                    <img src="{{asset('img/default.jpg')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <p class="price">1000$</p>
                        <div class="text-center">
                            <a href="#" class="btn btn-primary "><i class="bi bi-basket3"></i> Add to cart</a>
                        </div>
                        <div class="status"><i class="bi bi-check-lg status_icon"></i> В наличии </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
