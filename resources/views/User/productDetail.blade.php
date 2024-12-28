@extends('master')
@section('content')
    <!-- Product section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0"
                        src="{{ url('/product_images/' . $data['gallery']) }}" alt="image" />
                </div>
                <div class="col-md-6">
                    <form action="{{ route('organize.update' , $data['id']) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="Kulkas" value="{{ $data['name'] }}" required>
                            </div>
                            <div class="input-group mb-3">
                                <select class="form-select" name="category_id" id="inputGroupSelect01">
                                    <option> Choose Category... </option>
                                    @foreach ($category as $item)
                                        @if ($data['category_id'] == $item->id)
                                            <option value="{{ $item->id }}" selected>{{ $item->category_name }}</option>
                                        @else
                                            <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Price</label>
                                <input type="number" class="form-control" name="price" id="price" value="{{ $data['price'] }}"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Image</label>
                                <input type="file" name="image" class="form-control" id="image"
                                    placeholder="Kulkas">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                                <textarea class="form-control" name="description" id="description" rows="3" required> {{ $data['description'] }} </textarea>
                            </div>
                            @if ($data['user_id'] == session()->get('user')['id'])
                                <button type="submit" class="btn btn-primary">Update</button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete</button>
                            @endif
                            <a type="button" class="btn" href="{{ route('organize' , session()->get('user')['id']) }}">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </section>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Yakin Akan Menghapus {{ $data['name'] }}
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <a type="button" class="btn btn-danger" href="{{ route('organize.delete' , $data['id']) }}">Yes</a>
            </div>
          </div>
        </div>
      </div>

@endsection
