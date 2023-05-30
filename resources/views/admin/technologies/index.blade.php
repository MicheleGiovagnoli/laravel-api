@extends('layouts.admin')

@section('content')
    <table class="table" style="height:100vh">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">slug</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($technologies as $technology)
                <tr>
                    <td>{{ $technology->id }}</td>
                    <td>{{ $technology->name }}</td>
                    <td>{{ $technology->slug }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
