@extends('layouts.app')
@section('content')
<div class="p-5 mb-4 text-white my-jumbo">
    <h1 class="mb-4 my-name"></h1>
    <button class="btn btn-primary"><a class="text-white text-decoration-none" href="{{ route('admin.projects.index') }}">Visualizza</a></button>
</div>
@endsection
