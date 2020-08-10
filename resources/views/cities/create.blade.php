@extends('home')
@section('content')
    <div class="col-12">
        <div class="col-12">
            <h3 style="text-align: center"> Form Add City</h3>
        </div>
        <div>
            <form method="post" action="{{route('cities.add')}}">
                @csrf
                <div class="form-group">
                    <label>Name city</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter name" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
            </form>
        </div>
    </div>
@endsection
