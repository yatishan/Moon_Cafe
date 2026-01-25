@extends('admin.layout.master')
@section('content')
    <div>
        <h4 class="m-3">Addon</h4>
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
        <form class="m-3" action="{{ url('/admin/addon') }}" method="post">
            @csrf
            <div>
                <input type="" name="name" class="form-control mb-3" placeholder="addon name" value="{{ old('name') }}">
                <select name="addcat_id" class="form-select mb-3">
                    @foreach ($addon_categories as $addcat)
                    <option value="{{ $addcat->id }}">{{ $addcat->name }}</option>
                    @endforeach
                </select>
                <input type="" name="price" class="form-control" placeholder="addon price" value="{{ old('price') }}">
                <textarea class="form-control my-3" name="desc" id="" cols="3" rows="3">{{  old('desc',"description")  }}</textarea>
                <input type="submit" class="btn py-2 px-4 my-3 btn-coffee" value="Save">
            </div>
        </form>
        <table class="table table-bordered m-3 table-striped ">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Addon Category</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
               @foreach ($addons as $addon)
               <tr>
                    <th scope="row">{{ $addon->id }}</th>
                    <td>{{ $addon->name }}</td>
                    <td>{{ $addon->addon_category->name }}</td>
                    <td>{{ $addon->price }}</td>
                    <td>{{ $addon->created_at }}</td>
                    <td>
                        <a href="{{ url('/admin/addon/delete',$addon->id) }}" class="text-decoration-none">
                            <i class="fa-solid fa-trash me-2 text-danger" ></i>
                        </a>
                        <a href="{{ url('/admin/addon/edit',$addon->id) }}">
                             <i class="fa-solid fa-pen-to-square text-warning"></i>
                        </a>
                    </td>
                </tr>
               @endforeach

            </tbody>
        </table>
    </div>
@endsection

