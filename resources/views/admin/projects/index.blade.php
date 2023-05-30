@extends('layouts.admin')

@section('content')
    <table class="table p-5">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">Slug</th>
                <th scope="col">Tipo</th>
                <th scope="col">Tecnologia</th>
                <th scope="col">Info</th>
                <th scope="col">Modifica</th>
                <th scope="col">Elimina</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <td>{{ $project->id }}</td>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->content }}</td>
                    <td>{{ $project->slug }}</td>
                    <td>{{ $project->type ? $project->type->name : 'Nessun tipo' }}</td>
                    <td>
                        @foreach ($project->technologies as $technology)
                            <span class="badge text-bg-warning rounded-pill">
                                {{ $technology->name }}</span>
                        @endforeach
                    </td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('admin.projects.show', $project->slug) }}">Info</a>
                    </td>
                    <td>
                        <a class="btn btn-secondary" href="{{ route('admin.projects.edit', $project->slug) }}">Modifica</a>
                    </td>
                    <td>
                        <form class="form_delete_post"
                            action="{{ route('admin.projects.destroy', ['project' => $project->slug]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Elimina</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- MODALE --}}
    <div class="modal fade" id="confirmDeleteModal" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deleteModalLabel">Warning!
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="confirmDelete btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>
@endsection
