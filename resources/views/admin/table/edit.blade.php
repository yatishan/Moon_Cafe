@extends('admin.layout.master')
@section('content')
    <div>
        <h4 class="m-3">Table Management</h4>
        @if ($errors->any())
        <div class="alert alert-warning m-3" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if (session('info'))
        <div class="alert alert-success m-3" role="alert">
            {{ session('info') }}
        </div>
        @endif
        <form class="m-3" action="{{ url('/admin/table/update',$table->id) }}"  method="post" >
            @csrf
            <div>
                <input type="text" name="name" class="form-control mb-3 " placeholder="table name" value="{{ old('name',$table->name) }}">
                <input type="number" name="seat"  class="form-control mb-3" placeholder="seat" value="{{ old('seat',$table->seats) }}">
                <input type="text" name="location" class="form-control mb-3" placeholder="location" value="{{ old('location',$table->location) }}">
                <input type="text" name="status" class="form-control " placeholder="status" value="{{ old('status',$table->status) }}">
                <input type="submit" class="btn py-2 px-4 my-3 btn-coffee" value="Update">
            </div>
        </form>
    </div>
@endsection
