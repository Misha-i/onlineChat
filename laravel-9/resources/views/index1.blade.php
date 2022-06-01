@extends('layout1')

@section('title', 'Cars')

@section('content')
    <a class="btn btn-primary" role="button">Create car</a>
    <table class="table table-sm">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name cars</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cars as $car)
            <tr>
                <th scope="row">{{ $car->id }}</th>
                <th scope="row">{{ $car->name_cars }}</th>
                <td>
                    <form method="POST" >
                        <a type="button" class="btn btn-warning">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $cars->links() }}
@endsection
