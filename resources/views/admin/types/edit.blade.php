@extends('layouts.admin')

@section('content')
    <section class="container bg-dark rounded-3 mt-5 text-white">
        <h2 class="ms-4 pt-5">Modifica</h2>
        <form action="{{ route('admin.types.update', $type->slug) }}" method="POST" enctype="multipart/form-data"
            class="p-4">
            @csrf
            @method('PUT')

            <button type="submit" class="btn btn-success">Submit</button>
            <button type="reset" class="btn btn-primary">Reset</button>
            <button class="btn btn-danger mt-3 mb-3 ms-3"><a class="text-white text-decoration-none"
                    href="{{ route('admin.types.index') }}">Torna
                    alla sezione Admin</a></button>

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ old('name', $type->name) }}">
                @error('name')
                    <div class="invalid-feedback text-white">{{ $message }}</div>
                @enderror
            </div>
        </form>
    </section>
@endsection
