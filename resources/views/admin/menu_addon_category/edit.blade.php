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
        <form class="m-3" action="{{ url('/admin/menu_addon_category/update',$menu_addon_category->id) }}" enctype="multipart/form-data" method="post">
            @csrf
            <div>
                <select name="menu_id" class="form-select mb-3">
                    @foreach ($menus as $menu)
                        <option @selected( old('menu_id',$menu_addon_category->menu_id)==$menu->id) value="{{ $menu->id }}">{{ $menu->title }}</option>
                    @endforeach
                </select>
                <select name="addoncat_id" class="form-select mb-3">
                    @foreach ($addon_categories as $addcat)
                        <option @selected(old('addoncat_id',$menu_addon_category->addcat_id)==$addcat->id)  value="{{ $addcat->id }}">{{ $addcat->name }}</option>
                    @endforeach
                </select>
                <input type="submit" class="btn py-2 px-4 my-3 btn-coffee" value="Edit">
            </div>
        </form>
    </div>
@endsection
