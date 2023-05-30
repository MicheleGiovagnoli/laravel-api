@extends('layouts.admin')

@section('content')
    <table class="table" style="height:100vh">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Slug</th>
                <th scope="col">Numero di post</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($types as $type)
                <tr>
                    <td>{{ $type->id }}</td>
                    <td>{{ $type->name }}</td>
                    <td>{{ $type->slug }}</td>
                    <td>{{ count($type->project) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
