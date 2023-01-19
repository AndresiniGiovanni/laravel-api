@extends('layouts.admin')
@section('content')
    <section class="container bg-dark rounded-3 mt-5 text-white p-5">
        <h2 class="text-center pt-4">New Project</h2>
        <form action="{{ route('admin.projects.store') }}" method="POST" class="" enctype="multipart/form-data">
            @csrf

            <button type="submit" class="btn btn-success">Submit</button>
            <button type="reset" class="btn btn-primary ms-1">Reset</button>

            <div class="mb-3 mt-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                    name="title">
                @error('title')
                    <div class="invalid-feedback text-white">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-5 mt-5">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" id="content" name="content"></textarea>
            </div>

            <div class="mb-5 mt-5">
                <label for="cover_image" class="form-label">Upload Image</label>
                <input type="file" name="cover_image" id="cover_image" class="form-control"
                    @error('cover_image') is-invalid @enderror"">
                @error('title')
                    <div class="invalid-feedback text-white">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-5 mt-5">
                <label for="type_id" class="form-label">Select Type</label>
                <select name="type_id" id="type_id" class="form-control" @error('type_id') is-invalid @enderror>
                    <option value="">Select Type</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" {{ $type->id == old('type_id') ? 'selected' : '' }}>
                            {{ $type->name }}</option>
                    @endforeach
                </select>
                @error('type_id')
                    <div class="invalid-feedback text-white">{{ $message }}</div>
                @enderror
            </div>


            <div class="mb-5 mt-3">
                @foreach ($technologies as $technology)
                    <div class="form-check form-check-inline">
                        @if (old('technologies'))
                            <input type="checkbox" class="form-check-input" id="{{ $technology->slug }}"
                                name="technologies[]" value="{{ $technology->id }}"
                                {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }}>
                        @else
                            <input type="checkbox" class="form-check-input" id="{{ $technology->slug }}"
                                name="technologies[]" value="{{ $technology->id }}"
                                {{ $project->technologies->contains($technology, old('technologies', [])) ? 'checked' : '' }}>
                        @endif
                        <label class="form-check-label" for="{{ $technology->slug }}">{{ $technology->name }}</label>
                    </div>
                @endforeach





                {{-- <select multiple class="form-select" name="technologies[]" id="technologies">
                    @forelse ($technologies as $technology)
                            <option value="{{ $technology->id }}">
                                {{ $technology->name }}</option>
                    @empty
                        <option value="">No technologies</option>
                    @endforelse
                </select> --}}
            </div>
        </form>
    </section>
@endsection
