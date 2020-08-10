@extends('home')
@section('title','ListCity')
@section('content')
    <div class="col-12">
        <div class="row">
            <div class="col-12">
                <h2 style="text-align: center"> List City</h2>
            </div>
            <a href="{{route('cities.create')}}">Add</a>
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Number of Customer</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                @if(count($cities) == 0)
                    <tr>
                        <td>
                            No Data
                        </td>
                    </tr>
                @else
                    @foreach($cities as $key => $city)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$city->name}}</td>
                            <td> {{count($city->customers)}}</td>

                        </tr>
                    @endforeach
                @endif
                <tbody>
        </div>

    </div>


@endsection
