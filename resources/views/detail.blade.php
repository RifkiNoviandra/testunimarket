@extends('master')
@section('content')
    <!-- Product section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0"
                        src="{{ url('product_images/' . $product['gallery']) }}" alt="image" />
                </div>
                <div class="col-md-6">
                    <div class="small mb-1">SKU: BST-498</div>
                    <h1 class="display-5 fw-bolder">{{ $product['name'] }}</h1>
                    <div class="fs-5 mb-5">
                        <span class="text-decoration-line-through">${{ $product['price'] }}</span>
                        <span>${{ $product['price'] }}</span>
                    </div>
                    <p class="lead">{{ $product['description'] }}</p>
                    <div class="d-flex">
                        <form action="/add-to-cart" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value={{ $product['id'] }}>
                            <button class="btn btn-outline-warning flex-shrink-0">
                                <i class="bi-cart-fill me-1"></i>
                                Add to cart
                            </button>
                        </form>
                        <span style="padding: 5px;"></span>
                        <button class="btn btn-outline-primary flex-shrink-0">
                            <i class="bi-cart-fill me-1"></i>
                            Buy Now
                        </button>
                        <span style="padding: 5px;"></span>
                        @if (session()->get('user')['role_id'] == 3)
                            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">Review</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        @foreach ($review as $item)
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <div class="card w-50">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item['user']['name'] }}</h5>
                            <h6 class="card-title">Rating {{ $item['rating'] }}</h6>
                            <p class="card-text">{{ $item['review'] }}</p>
                            {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </section>

    <section class="py-5">
        @foreach ($review_user as $key => $item)
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <div class="card w-50">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item['user']['name'] }}</h5>
                            <h6 class="card-title">Rating {{ $item['rating'] }}</h6>
                            <p class="card-text">{{ $item['review'] }}</p>
                            <button type="button" class="btn btn-warning me-2" data-bs-toggle="modal"
                                data-bs-target="#editModal{{$key}}">Review</button><a href="{{ route('review.delete', $item['id']) }}" class="btn btn-danger me-2">Delete</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="editModal{{$key}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Review</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('review.update', $item['id']) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <div class="input-group mb-3">
                                    <select class="form-select" name="rating" id="inputGroupSelect01">
                                        <option value="{{ $item['rating'] }}" selected>{{$item['rating']}}</option>
                                        <option value="Sempurna">Sempurna</option>
                                        <option value="Baik">Baik</option>
                                        <option value="Cukup">Cukup</option>
                                        <option value="Kurang">Kurang</option>
                                        <option value="Tidak Layak">Tidak Layak</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Review</label>
                                    <textarea class="form-control" name="review" id="exampleFormControlTextarea1" rows="3" required>{{ $item['review'] }}</textarea>
                                  </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        @endforeach
    </section>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Review</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('review.create', $product['id']) }}" method="POST">
                    @csrf
                    <input name="user_id" value="{{ session()->get('user')['id'] }}" hidden>
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <select class="form-select" name="rating" id="inputGroupSelect01" required>
                                <option> Choose Condition... </option>
                                <option value="Sempurna">Sempurna</option>
                                <option value="Baik">Baik</option>
                                <option value="Cukup">Cukup</option>
                                <option value="Kurang">Kurang</option>
                                <option value="Tidak Layak">Tidak Layak</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Review</label>
                            <textarea class="form-control" name="review" id="exampleFormControlTextarea1" rows="3" required></textarea>
                          </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" href="">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
