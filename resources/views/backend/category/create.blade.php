@extends('master')

@section('content')
    <h2>Add Category</h2>

    <form action="{{ route('categories.store') }}" method="post">
        @csrf

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
            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Enter category name">
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary btn-block">Add Category</button>
    </form>

    <hr>

    <p>
        <a href="{{ route('categories.index') }}" class="btn btn-primary btn-block">
            Back to Category List
        </a>
    </p>
@endsection
