@extends('layouts.admin')

@section('content')
    <div class="container bg-dark rounded-3 mt-5 text-white">

        <div class="pt-3 mb-2"> <strong style="font-size: 24px">Titolo : </strong>{{ $type->name }}</div>
        <ul>
            @foreach ($type->projects as $project)
                <li>{{ $project->title }}</li>
            @endforeach
        </ul>
        <div class="d-inline">
            <button class="btn btn-primary mt-3 mb-4"><a class="text-white text-decoration-none"
                    href="{{ route('admin.types.index') }}">Torna alla
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
