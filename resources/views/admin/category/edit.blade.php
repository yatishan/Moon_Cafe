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
        <form class="m-3" action="{{ url('/admin/category/update',$category->id) }}" method="post">
            @csrf
            <div>
                <input type="" name="cat_name" class="form-control " placeholder="menu category" value="{{ $category->title }}">
                <input type="submit" class="btn py-2 px-4 my-3 btn-coffee" value="Update">
            </div>
        </form>
    </div>
@endsection
