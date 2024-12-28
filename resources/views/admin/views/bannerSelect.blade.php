@extends('admin.layouts.base')

@section('title', 'Manage Banner Product')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Showed Product</h6>
        </div>
        <div class="card-body">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    @foreach ($product_banner as $item)
                        <div class="col mb-5">
                            <div class="card h-100">
                                <!-- Product image-->
                                <img class="card-img-top" src="{{ url('product_images/' . $item['gallery']) }}"
                                    alt="image" />
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
                                    <div class="text-center"><a class="btn btn-outline-danger mt-auto"
                                            href="{{ route('admin.banner.down', $item['id']) }}">Remove</a></div>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All Product</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>User</th>
                            <th>Image</th>
                            <th>Banner</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product as $item)
                            <tr>
                                <td>{{ $item['name'] }}</td>
                                <td>{{ $item['price'] }}</td>
                                <td>{{ $item['description'] }}</td>
                                <td>{{ $item['user']['name'] }}</td>
                                <td><img width="200" height="100" class="object-fit-contain" src="{{ url('product_images/' . $item['gallery']) }}" alt="image"></td>
                                <td>
                                    @if ($item['flag_banner'] == 'no')
                                        <a class="btn btn-success me-2 w-100"
                                            href="{{ route('admin.banner.up', $item['id']) }}">UP
                                        </a>
                                    @else
                                        <a class="btn btn-danger me-2 w-100"
                                            href="{{ route('admin.banner.down', $item['id']) }}">Remove
                                        </a>
                                    @endif
                                </td>

                                <!-- Modal Delete -->
                                <div class="modal fade" id="exampleModalDelete{{ $item['id'] }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Yakin Akan Menghapus {{ $item['name'] }}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <a type="button" class="btn btn-danger"
                                                    href="{{ route('admin.user.delete', $item['id']) }}">Yes</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
