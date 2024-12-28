@extends('admin.layouts.base')

@section('title', 'Detail User')
@section('content')
    <form action="{{ route('admin.user.update' , $data['id']) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" class="form-control" value="{{$data['name']}}" name="name" id="name" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" value="{{$data['email']}}" name="email" id="email" aria-describedby="emailHelp" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password" aria-describedby="passHelp">
            <div id="passHelp" class="form-text">Kosongi Jika Tidak Di Update</div>
        </div>
        <div class="input-group mb-3">
            <select class="form-select" name="role_id" id="inputGroupSelect01" required>
                @foreach ($role as $item)
                    @if ($item['id'] == $data['role_id'])
                        <option value="{{ $item->id }}" selected>{{ $item->role_name }}</option>
                    @else
                        <option value="{{ $item->id }}">{{ $item->role_name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-warning">Update</button>
        <a class="btn btn-primary" href="{{route('admin.user')}}" >Back</a>
    </form>
@endsection
