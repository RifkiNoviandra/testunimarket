@extends('master')
@section("content")
    <div style="height: auto">
        <div class="col-sm-10">
            <div class="trending-wrapper">
                <h4>Result for Products</h4>
                <a class="btn btn-success" href="/order-now">Order Now</a> <br> <br>
                @foreach($products as $item)
                    <div class=" row searched-item cart-list-devider">
                        <div class="col-sm-3">
                            <a href="detail/{{$item->id}}">
                                <img style="height: 100px;" src="{{$item->gallery}}">
                            </a>
                        </div>
                        <div class="col-sm-4">
                            <div class="">
                                <h5>{{$item->name}}</h5>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <a href="/remove-cart/{{$item->cart_id}}" class="btn btn-danger" >Remove from Cart</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <a class="btn btn-success" href="/order-now">Order Now</a> <br> <br>

        </div>
    </div>
@endsection
