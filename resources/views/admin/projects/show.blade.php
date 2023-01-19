@extends('layouts.admin')

@section('content')
    <div class="container bg-dark rounded-3 mt-5 text-white">

        <div class="pt-2 mb-1"> <strong style="font-size: 24px">Title : </strong>{{ $project->title }}</div>

        <div class="pt-2 mb-1"> <strong style="font-size: 24px">Description : </strong> {{ $project->content }}</div>

        @if ($project->type)
            <div class="pt-1 mb-1">
                <strong style="font-size: 24px">
                    Type :
                </strong>
                {{ $project->type->name }}
            </div>
        @endif

        <div class="pt-1 mb-1">
            <strong style="font-size: 24px">Technology : </strong>
            @if ($project->technologies && count($project->technologies) > 0)
                @foreach ($project->technologies as $technology)
                    <span>{{ $technology->name }}</span>
                @endforeach
            @endif
        </div>


        <div class="mb-4">
            <img src="{{ asset('storage/' . $project->cover_image) }}">
        </div>
        <div class="d-inline">
            <button class="btn btn-primary mt-3 mb-4"><a class="text-white text-decoration-none"
                    href="{{ route('admin.projects.index') }}">Torna alla
                    sezione Admin</a></button>
        </div>

        <div class="d-inline">
            <form action="" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger mb-4">Elimina</button>
            </form>
        </div>
    </div>
@endsection
