@extends('layouts.admin')

@section('content')
    <section class="container bg-dark rounded-3 mt-5 mb-5 text-white p-5">
        <div class="d-flex justify-content-between">
            <div>
                <h2 class="pt-5">{{ $project->title }}</h2>
            </div>
            <div class="mt-3 me-2">
                <img width="100" src="{{ asset('storage/' . $project->cover_image) }}">
            </div>
        </div>
        <form action="{{ route('admin.projects.update', $project->slug) }}" method="POST" enctype="multipart/form-data"
            class="">
            @csrf
            @method('PUT')

            <button type="submit" class="btn btn-success mt-2 ">Submit</button>
            <button type="reset" class="btn btn-primary ms-1 mt-2">Reset</button>
            <div class="mb-3 mt-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                    name="title" value="{{ old('title', $project->title) }}">
                @error('title')
                    <div class="invalid-feedback text-white">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-5 mt-5">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" id="content" name="content">{{ old('title', $project->content) }}</textarea>
            </div>

            <div class="">
                <label for="cover_image" class="form-label">Upload Image</label>
                <input type="file" name="cover_image" id="cover_image" class="form-control"
                    @error('cover_image') is-invalid @enderror"">
                @error('title')
                    <div class="invalid-feedback text-white">{{ $message }}</div>
                </div>
            @enderror


            <div class="mb-5 mt-3">
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


            <span>Technologies &#58;</span>
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

                {{-- <div class="mb-5 mt-3">
                <label for="technologies" class="form-label">Technologies</label>
                <select multiple class="form-select" name="technologies[]" id="technologies">
                    <option value="">Select Technologies</option>
                    @forelse ($technologies as $technology)
                        @if ($errors->any())
                            <option value="{{ $technology->id }}"
                                {{ in_array($technology->id, old('technologies[]')) ? 'selected' : '' }}>
                                {{ $technology->name }}</option>
                        @else
                            <option value="{{ $technology->id }}"
                                {{ $project->technologies->contains($technology->id) ? 'selected' : '' }}>
                                {{ $technology->name }}</option>
                        @endif
                    @empty
                        <option value="">No technologies</option>
                    @endforelse
                </select>
            </div> --}}
        </form>
    </section>
@endsection
