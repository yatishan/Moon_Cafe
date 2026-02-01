@extends('admin.layout.master')
@section('content')
    <div>
        <h4 class="m-3">Menu Category</h4>
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
        <form class="m-3" action="{{ url('/admin/category/list') }}" method="post">
            @csrf
            <div>
                <input type="" name="cat_name" class="form-control " placeholder="menu category" value="{{ old('cat_name') }}">
                <input type="submit" class="btn py-2 px-4 my-3 btn-coffee" value="Save">
            </div>
        </form>
        <table class="table table-bordered m-3 table-striped ">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Created Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
               @foreach ($categories as $cat)
               <tr>
                    <th scope="row">{{ $cat->id }}</th>
                    <td>{{ $cat->title }}</td>
                    <td>{{ $cat->created_at }}</td>
                    <td>
                        <a href="{{ url('/admin/category/delete',$cat->id) }}" class="text-decoration-none">
                            <i class="fa-solid fa-trash me-2 text-danger" ></i>
                        </a>
                        <a href="{{ url('/admin/category/edit',$cat->id) }}">
                             <i class="fa-solid fa-pen-to-square text-warning"></i>
                        </a>
                    </td>
                </tr>
               @endforeach

            </tbody>
        </table>
    </div>
@endsection
