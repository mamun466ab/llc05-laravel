@extends('master')

@section('content')
    <h2>Edit Category</h2>

    <form action="{{ route('categories.update', $category->id) }}" method="post">
        @csrf
        @method('PUT')

        @if ($errors->any())
            <div class="alert alert-danger">
                @if($errors->count() === 1)
                    {{ $errors->first() }}
                @else
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        @endif

        @if(session()->has('message'))
            <div class="alert alert-{{ session('type') }}">
                {{ session('message') }}
            </div>
        @endif

        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" class="form-control" name="name" value="{{ $category->name }}" placeholder="Enter category name">
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control">
                <option value="1" @if ($category->status === 1) selected @endif>Active</option>
                <option value="0" @if ($category->status === 0) selected @endif>Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary btn-block">Edit Category</button>
    </form>

    <hr>

    <p>
        <a href="{{ route('categories.index') }}" class="btn btn-primary btn-block">
            Back to Category List
        </a>
    </p>
@endsection
