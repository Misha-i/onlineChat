@extends('layout1')

@section('title', isset($car) ? 'Update '. $car->name_cars : 'Cars')

@section('content')
    <form method="POST"
{{--          @if(isset($car))--}}
{{--              action="{{ route('cars.update', $car) }}"--}}
{{--          @else--}}
{{--              action="{{ route('cars.store') }}"--}}
{{--          @endif--}}
          class="mt-3">
        @csrf
{{--        @isset($car)--}}
{{--            @method('PUT')--}}
{{--        @endisset--}}

        <div class="row">
            <div class="col">
                <input name="name_cars"
                       {{--value="{{ old('name_cars', isset($car) ? $car->name_cars : null) }}"--}}
                       type="text" class="form-control" placeholder="Name" aria-label="name_cars">
                {{--@error('name_cars')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror--}}
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <button type="submit" class="btn btn-success">Create</button>
            </div>
        </div>

    </form>
@endsection
