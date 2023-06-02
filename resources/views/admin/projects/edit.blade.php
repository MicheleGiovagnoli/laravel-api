@extends('layouts.admin')

@section('content')
    <form method="POST" action="{{ route('admin.projects.update', ['project' => $project->slug]) }}" style="height:100vh"
        enctype="multipart/form-data">

        @csrf
        @method('PUT')
        {{-- SELEZIONA TITOLO --}}
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="title" name="title"
                value="{{ old('title', $project->title) }}">
        </div>
        {{-- SELEZIONA CONTENUTO --}}
        <div class="mb-3">
            <label for="content" class="form-label">Contenuto</label>
            <input type="text" class="form-control" id="content" name="content"
                value="{{ old('content', $project->content) }}">
        </div>
        {{-- SELEZIONA CATEGORIA --}}
        <div class="mb-3">
            <label for="type_id" class="form-label">Seleziona categoria</label>
            <select class="form-select" name="type_id" id="type_id" @error('type_id') is-invalid @enderror>
                <option selected>Open this select menu</option>
                <option @selected(old('type_id', $project->type_id) == '') value="">Nessuna categoria</option>
                @foreach ($types as $type)
                    <option @selected(old('type_id', $project->type_id) == $type->id) value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
                @error('type_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </select>
        </div>
        {{-- SELEZIONA TECNOLOGIA --}}
        <div class="mb-3">
            @foreach ($technologies as $technology)
                @if ($errors->any())
                    <input id="technology_{{ $technology->id }}" @if (in_array($technology->id, old('technologies', []))) checked @endif
                        type="checkbox" name="technologies[]" value="{{ $technology->id }}">
                @else
                    <input id="technology_{{ $technology->id }}" @if ($project->technologies->contains($technology->id)) checked @endif
                        type="checkbox" name="technologies[]" value="{{ $technology->id }}">
                @endif
                <label for="technology_{{ $technology->id }}" class="form-label">{{ $technology->name }}</label>
                <br>
            @endforeach
            @error('technologies')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        {{-- SELEZIONA IMMAGINE --}}
        <div class="mb-3">
            <label for="cover_image" class="form-label">Seleziona immagine di copertina</label>


            @if ($project->cover_image)
                <img class="img-thumbnail" src="{{ asset('storage/' . $project->cover_image) }}"
                    alt="{{ $project->title }}" />
            @endif

            <input type="file" class="form-control @error('cover_image') is-invalid @enderror " id="cover_image"
                name="cover_image">

            @error('cover_image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Invia</button>
    </form>
@endsection
