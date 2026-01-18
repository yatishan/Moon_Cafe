@extends('admin.layout.master')
@section('content')
    <div>
        <h4 class="m-3">Menu</h4>
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
        <form class="m-3" action="{{ url('/admin/menu/update',$menu->id) }}" enctype="multipart/form-data" method="post" >
            @csrf
            <div>
                <input type="text" name="name" class="form-control mb-3 " placeholder="menu name" value="{{ old('name',$menu->title )}}">
                <select name="cat_id" class="form-select mb-3">
                    @foreach ($categories as $cat)
                     <option value="{{ $cat->id }}"
                      @selected(old('cat_id', $menu->cat_id) ==   $cat->id)>
                      {{ $cat->title }}
                     </option>
                    @endforeach
                </select>
                <input type="file" name="image" class="form-control mb-3" id="">
                <input type="number" name="price"  class="form-control mb-3" placeholder="menu price" value="{{ old('price', $menu->price) }}">
                <textarea type="text" name="detail" class="form-control" placeholder="menu description" >{{ old('detail',$menu->detail) }}</textarea>
                <input type="submit" class="btn py-2 px-4 my-3 btn-coffee" value="Update">
            </div>
        </form>
    </div>
@endsection

