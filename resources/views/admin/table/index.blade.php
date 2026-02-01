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
        <form class="m-3" action="{{ url('/admin/table/list') }}"  method="post" >
            @csrf
            <div>
                <input type="text" name="name" class="form-control mb-3 " placeholder="table name" value="{{ old('name') }}">
                <input type="number" name="seat"  class="form-control mb-3" placeholder="seat" value="{{ old('seat') }}">
                <input type="text" name="location" class="form-control mb-3" placeholder="location" value="{{ old('location') }}">
                <input type="text" name="status" class="form-control " placeholder="status" value="{{ old('status') }}">
                <input type="submit" class="btn py-2 px-4 my-3 btn-coffee" value="Save">
            </div>
        </form>
        <table class="table table-bordered m-3 table-striped ">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Seat</th>
                    <th scope="col">Location</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
               @foreach ($tables as $table)
               <tr>
                    <th scope="row">{{ $table->id }}</th>
                    <td>{{ $table->name }}</td>
                    <td>{{ $table->seats }}</td>
                    <td>{{ $table->location }}</td>
                    <td>{{ $table->status }}</td>
                    <td>
                        <a href="{{ url('/admin/table/delete',$table->id) }}" class="text-decoration-none">
                            <i class="fa-solid fa-trash me-2 text-danger" ></i>
                        </a>
                        <a href="{{ url('/admin/table/edit',$table->id) }}">
                             <i class="fa-solid fa-pen-to-square text-warning"></i>
                        </a>
                    </td>
                </tr>
               @endforeach

            </tbody>
        </table>
    </div>
@endsection
