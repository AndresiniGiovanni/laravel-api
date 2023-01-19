@extends('layouts.admin')
@section('content')
    <section class="container bg-dark rounded-3 mt-5 pt-3 text-white">
        <h2 class="text-center pt-2">New Type</h2>
        <form action="{{ route('admin.types.store') }}" method="POST" class="p-4" enctype="multipart/form-data">
            @csrf
            <button type="submit" class="btn btn-success">Submit</button>
            <button type="reset" class="btn btn-primary ms-2">Reset</button>
            <button class="btn btn-danger mt-3 mb-3 ms-3"><a class="text-white text-decoration-none"
                    href="{{ route('admin.types.index') }}">Back to Admin</a></button>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                    name="name">
                @error('name')
                    <div class="invalid-feedback text-white">{{ $message }}</div>
                @enderror
            </div>
        </form>
    </section>
@endsection
