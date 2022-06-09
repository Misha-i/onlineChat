@extends('layouts.layout')

@section('title')@parent:: Registration@endsection

@section('header')
    @parent
@endsection

@section('content')

    <div class="container">



        <form class="mt-5" method="post" action="{{ route('posts.store') }}">

            @csrf

            <div class="form-group">
                <label for="name">Your name</label>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

        </form>
    </div>


@endsection
