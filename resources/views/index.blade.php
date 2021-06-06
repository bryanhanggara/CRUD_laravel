@extends('layout')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }

    </style>
    <div class="uper">
        @if (session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br />
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Game Name</td>
                    <td>Game Price</td>
                    <td colspan="2">Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($games as $game)
                    <tr>
                        <td>{{ $game->id }}</td>
                        <td>{{ $game->name }}</td>
                        <td>{{ $game->price }}</td>
                        <td><a href="{{ route('bryan.edit', $game->id) }}" class="btn btn-primary">Edit</a></td>
                        <td>
                            <form action="{{ route('bryan.destroy', $game->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>

                        </td>
                    </tr>
                @endforeach
                <a href="{{ route('bryan.create') }}"><button class="btn btn-warning" type="submit">Tambah
                        Data</button></a>
            </tbody>
        </table>
        <div>
        @endsection
