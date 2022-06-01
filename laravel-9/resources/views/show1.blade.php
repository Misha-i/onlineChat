@extends('layout1')

@section('title', 'Car '.$car->name_cars)

@section('content')
    <a type="button" class="btn btn-secondary">Back to cars</a>
    <div class="card mt-3"  style="width: 18rem;">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Id: {{$car->id}}</li>
            <li class="list-group-item">Created: {{$car->created_at->format('d/m/y h:i:s')}}</li>
            <li class="list-group-item">Updated: {{$car->updated_at->format('d/m/y h:i:s')}}</li>
        </ul>
    </div>

   {{-- <form method="POST" class="mt-3" action="{{ route('cars.destroy', $car) }}">
        <a type="button" class="btn btn-warning" href="{{ route('cars.edit', $cars) }}">Edit</a>
        @csrf
        @method('DELETE')
        <button class="btn btn-danger" type="submit">Delete</button>
    </form>--}}

@endsection

