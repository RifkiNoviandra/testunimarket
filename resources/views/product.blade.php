@extends('master')
@section('content')
    <!-- Header-->
    <!-- Section-->

    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <center>
            <div class="carousel-inner w-75">
                @foreach ($banner as $item)
                    @if ($loop->index == 0)
                        <a href="/detail/{{ $item['id'] }}">
                            <div class="carousel-item active" data-bs-interval="10000">
                                <img src="{{ url('product_images/' . $item['gallery']) }}"
                                    class="d-block w-100 object-fit-contain" alt="image" height="300">
                                <div class="position-absolute bottom-0 start-0 m-5 py-2 px-3 rounded-2 bg-dark text-white"
                                    style="margin-left: 10%!important">
                                    $ {{ $item['price'] }}
                                </div>
                            </div>
                        </a>
                    @else
                        <a href="/detail/{{ $item['id'] }}">
                            <div class="carousel-item" data-bs-interval="10000">
                                <img src="{{ url('product_images/' . $item['gallery']) }}"
                                    class="d-block w-75 object-fit-contain" alt="image" height="300">
                                <div class="position-absolute bottom-0 start-0 m-5 px-3 py-2 rounded-2 bg-dark text-white"
                                    style="margin-left: 10%!important">
                                    $ {{ $item['price'] }}
                                </div>
                            </div>
                        </a>
                    @endif
                @endforeach
                <button class="carousel-control-prev border-1 rounded-1" type="button"
                    data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next border-1 rounded-1" type="button"
                    data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </center>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p style="text-align: center">{{ $message }}</p>
            </div>
        @endif

        <section class="pt-5 pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <h3 class="mb-3">Flash Sale </h3>
                    </div>
                    <div class="col-12">
                        <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner row align-items-center">
                                <div class="col-2 text-right">
                                    <a class="btn btn-primary ms-4 mb-3" href="#carouselExampleIndicators2" role="button"
                                        data-slide="prev">
                                        <i class="fa fa-arrow-left"></i>
                                    </a>
                                    <a class="btn btn-primary mb-3 " href="#carouselExampleIndicators2" role="button"
                                        data-slide="next">
                                        <i class="fa fa-arrow-right"></i>
                                    </a>
                                </div>
                                @foreach ($sale as $key => $item)
                                    @if ($loop->index == 0)
                                        <div class="carousel-item active col-9">
                                            <div class="row justify-content-center">
                                    @endif
                                    <div class="col-3 mb-5">
                                        <div class="card h-100">
                                            <!-- Product image-->
                                            <img class="card-img-top object-fit-contain" width="255" height="165"
                                                src="{{ url('product_images/' . $item['gallery']) }}" alt="image" />
                                            <!-- Product details-->
                                            <div class="card-body p-4">
                                                <div class="text-center">
                                                    <!-- Product name-->
                                                    <h5 class="fw-bolder">{{ $item['name'] }}</h5>
                                                    <!-- Product price-->
                                                    ${{ $item['price'] }}
                                                </div>
                                            </div>
                                            <!-- Product actions-->
                                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                                <div class="text-center"><a class="btn btn-outline-dark mt-auto"
                                                        href="/detail/{{ $item['id'] }}">View options</a></div>
                                            </div>
                                        </div>

                                    </div>
                                    @if (($loop->iteration % 3 == 0 && $loop->index != 0) || isset($item[$key + 1]))
                            </div>
                        </div>
                        @endif
                        @if ($loop->iteration % 3 == 0 && !isset($item[$key + 1]))
                            <div class="carousel-item">
                                <div class="row justify-content-center">
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
    </div>
    </div>
    </div>
    </section>

    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach ($products as $item)
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top object-fit-contain" width="255" height="165"
                                src="{{ url('product_images/' . $item['gallery']) }}" alt="image" />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{ $item['name'] }}</h5>
                                    <!-- Product price-->
                                    ${{ $item['price'] }}
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto"
                                        href="/detail/{{ $item['id'] }}">View options</a></div>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Bootstrap core JS-->
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script> --}}
    <!-- Core theme JS-->
    {{-- <script src="js/scripts.js"></script> --}}
@endsection
