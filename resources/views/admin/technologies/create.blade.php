@extends('layouts.admin')

@section('content')
    <form method="POST" action="{{ route('admin.technologies.store') }}" style="height:100vh">
        @csrf
        {{-- TECNOLOGIA --}}
        <div class="mb-3">
            <label for="name" class="form-label">Nome Tecnologia:</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <button type="submit" class="btn btn-primary">Invia</button>
    </form>
@endsection
