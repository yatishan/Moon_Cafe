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
        <form class="m-3" action="{{ url('/admin/addon/update',$addon->id) }}" method="post">
            @csrf
            <div>
                <input type="" name="name" class="form-control mb-3" placeholder="addon name" value="{{ old('name',$addon->name) }}">
                <select name="addcat_id" class="form-select mb-3">
                    @foreach ($addon_categories as $addcat)
                    <option @selected($addcat->id==$addon->addcat_id) value="{{ $addcat->id }}">{{ $addcat->name }}</option>
                    @endforeach
                </select>
                <input type="" name="price" class="form-control" placeholder="addon price" value="{{ old('price',$addon->price) }}">
                <textarea class="form-control my-3" name="desc" id="" cols="3" rows="3">{{  old('desc',"description")  }}</textarea>
                <input type="submit" class="btn py-2 px-4 my-3 btn-coffee" value="Update">
            </div>
        </form>
    </div>
@endsection

