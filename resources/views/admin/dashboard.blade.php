@extends('admin.layout.master')
@section('content')
    <div>
        <h4 class="m-3">Order</h4>
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
        <div class="m-3">
             {{ $menus->links() }}
        </div>
        <table class="table table-bordered m-3 table-striped ">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Menu Category</th>
                    <th scope="col">Image</th>
                    <th scope="col">Detail</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
               @foreach ($menus as $menu)
               <tr>
                    <th scope="row">{{ $menu->id }}</th>
                    <td>{{ $menu->title }}</td>
                    <td>{{ $menu->price }}</td>
                    <td>{{ $menu->category->title }}</td>
                    <td><img style="width: 100px;" src="{{ asset('storage/images/'.$menu->image)  }}" alt=""></td>
                    <td>{{ $menu->detail }}</td>
                    <td>
                        <a href="{{ url('/admin/menu/delete',$menu->id) }}" class="text-decoration-none">
                            <i class="fa-solid fa-trash me-2 text-danger" ></i>
                        </a>
                        <a href="{{ url('/admin/menu/edit',$menu->id) }}">
                             <i class="fa-solid fa-pen-to-square text-warning"></i>
                        </a>
                    </td>
                </tr>
               @endforeach

            </tbody>
        </table>
    </div>
@endsection
