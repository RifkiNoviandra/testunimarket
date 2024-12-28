@extends('master')
@section('content')
    <div style="height: auto;">
        <div class="col-sm-4">
            <a href="#">Filter</a>
        </div>
        <div class="col-sm-4">
            <div class="trending-wrapper" style="margin: 30px;>
                <h4>
                    Result for Products
                </h4>
                @foreach ($products as $item)
                    <div class="searched-item">
                        <a href="detail/{{ $item['id'] }}">
                            <img class="trending-image" src="{{ $item['gallery'] }}" alt="">
                            <div class="">
                                <h3>{{ $item['name'] }}</h3>
                                <h6>{{ $item['description'] }}</h6>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
