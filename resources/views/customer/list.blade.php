@extends('home')
@section('title', 'CustomerList')
@section('content')
    <div class="col-12">
        <div class="row">
            <div class="col-12">
                <h2 style="text-align: center">Customer List</h2>
            </div>
            <div class="col-12">
                @if(Session::has('success'))
                    <p class="text-success">
                        <i class="fa fa-check" aria-hidden="true"></i>{{ Session::get('success') }}
                    </p>
                @endif
            </div>
        </div>
        <a href="{{route('customers.create')}}">Add Customer</a>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">DOB</th>
                <th scope="col">Email</th>
                <th scope="col">Image</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @if(count($customers) == 0)
                <tr>
                    <td>No Data</td>
                </tr>
            @else
                @foreach($customers as $key => $customer)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$customer->name}} </td>
                        <td>{{$customer->dob}} </td>
                        <td>{{$customer->email}} </td>
                        <td>
                            @if($customer->image)
                                <img src="{{ asset('storage/'.$customer->image)}}" alt=""
                                     style="width: 150px; height: 80px">
                            @else
                                {{'Not Image'}}
                            @endif
                        </td>
                        <td><a href="{{route('customers.edit', $customer->id)}}">Sửa</a></td>
                        <td><a href="{{route('customers.delete', $customer->id)}}" class="text-danger"
                               onclick="return confirm('Are you sure')">Xóa</a></td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@endsection
