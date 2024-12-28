@extends('master')
@section("content")
    <div style="height: auto;">
        <div class="col-sm-10">
            <div class="trending-wrapper" style="margin: 30px;">
                <h4>my orders </h4>
                @foreach($orders as $item)
                    <div class=" row searched-item" style="border-bottom: 1px solid #ccc;margin-bottom: 20px;padding-bottom: 20px">
                        <div class="col-sm-3">
                            <a href="detail/{{$item->id}}">
                                <img class="trending-image" style="height: 100px;" src="{{$item->gallery}}">
                            </a>
                        </div>
                        <div class="col-sm-4">
                            <div class="">
                                <h2>Name : {{$item->name}}</h2>
                                <h5>Delivery Status : {{$item->status}}</h5>
                                <h5>Address : {{$item->address}}</h5>
                                <h5>Payment Status : {{$item->payment_status}}</h5>
                                <h5>Payment Method : {{$item->payment_method}}</h5>

                            </div>
                        </div>

                    </div>
                @endforeach
            </div>

        </div>
    </div>
@endsection
