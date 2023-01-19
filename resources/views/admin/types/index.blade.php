@extends('layouts.admin')
@section('content')
    <a class="btn btn-primary mt-5" href="{{ route('admin.types.create') }}">Add new type</a>
    <div class="mt-5 row ">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Types</th>
                    <th class="ps-3" scope="col">Edit</th>
                    <th class="ps-4" scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($types as $type)
                    <tr>
                        <th scope="row">{{ $type->id }}</th>
                        <td><a class="text-decoration-none text-black" href="{{ route('admin.types.show', $type->slug) }}"
                                title="View Project">{{ $type->name }}</a></td>
                        <td>{{ count($type->projects) }}</td>
                        <td><a class="link-secondary" href="{{ route('admin.types.edit', $type->slug) }}" title="Edit Post">
                                <button type="submit" class="btn btn-success"
                                    data-item-title="{{ $type->title }}">Edit</button></a></td>
                        <td>
                            <form action="{{ route('admin.types.destroy', $type->slug) }}"method='POST'>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger delete-button"
                                    data-item-title="{{ $type->title }}">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @include('partials.admin.modal-delete')
@endsection
