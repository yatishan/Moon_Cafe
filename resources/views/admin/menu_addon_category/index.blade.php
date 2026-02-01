@extends('admin.layout.master')
@section('content')
    <div>
        <h4 class="m-3">Menu Addon Category</h4>
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
        <form class="m-3" action="{{ url('/admin/menu_addon_category/list') }}" enctype="multipart/form-data" method="post">
            @csrf
            <div>
                <select name="menu_id" class="form-select mb-3">
                    @foreach ($menus as $menu)
                        <option value="{{ $menu->id }}">{{ $menu->title }}</option>
                    @endforeach
                </select>
                <select name="addoncat_id" class="form-select mb-3">
                    @foreach ($addon_categories as $addcat)
                        <option value="{{ $addcat->id }}">{{ $addcat->name }}</option>
                    @endforeach
                </select>
                <input type="submit" class="btn py-2 px-4 my-3 btn-coffee" value="Save">
            </div>
        </form>
        <table class="table table-bordered m-3 table-striped ">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Menu</th>
                    <th scope="col">Addon Category</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($menu_addon_categories as $mac)
                    <tr>
                        <th scope="row">{{ $mac->id }}</th>
                        <td>{{ $mac->menu->title }}</td>
                        <td>{{ $mac->addon_category->name }}</td>
                        <td>
                            <a href="{{ url('/admin/menu_addon_category/delete', $mac->id) }}" class="text-decoration-none">
                                <i class="fa-solid fa-trash me-2 text-danger"></i>
                            </a>
                            <a href="{{ url('/admin/menu_addon_category/edit', $mac->id) }}">
                                <i class="fa-solid fa-pen-to-square text-warning"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach



            </tbody>
        </table>
    </div>
@endsection
