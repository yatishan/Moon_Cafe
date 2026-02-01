@extends('admin.layout.master')
@section('content')
    <div>
        <h4 class="m-3">Addon Category</h4>
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
        <form class="m-3" action="{{ url('/admin/addonCategory/list') }}" method="post">
            @csrf
            <div>
                <input type="" name="name" class="form-control " placeholder="addon category" value="{{ old('name') }}">
                <textarea class="form-control my-3" name="desc" id="" cols="3" rows="3">{{  old('desc',"description")  }}</textarea>
                <input type="submit" class="btn py-2 px-4 my-3 btn-coffee" value="Save">
            </div>
        </form>
        <table class="table table-bordered m-3 table-striped ">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Created Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
               @foreach ($addon_categories as $add_cat)
               <tr>
                    <th scope="row">{{ $add_cat->id }}</th>
                    <td>{{ $add_cat->name }}</td>
                    <td>{{ $add_cat->detail }}</td>
                    <td>{{ $add_cat->created_at }}</td>
                    <td>
                        <a href="{{ url('/admin/addonCategory/delete',$add_cat->id) }}" class="text-decoration-none">
                            <i class="fa-solid fa-trash me-2 text-danger" ></i>
                        </a>
                        <a href="{{ url('/admin/addonCategory/edit',$add_cat->id) }}">
                             <i class="fa-solid fa-pen-to-square text-warning"></i>
                        </a>
                    </td>
                </tr>
               @endforeach

            </tbody>
        </table>
    </div>
@endsection

