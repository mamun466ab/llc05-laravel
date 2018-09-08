@extends('master')

@section('content')
    <div class="well">
        <h2>Category List</h2>

        <p>
            <a href="{{ route('categories.create') }}" class="btn btn-success">
                Add Category
            </a>
        </p>

        @if(session()->has('message'))
            <div class="alert alert-{{ session('type') }}">
                {{ session('message') }}
            </div>
        @endif

        <table class="table table-bordered table-condensed">
            <thead>
            <tr>
                <th>ID</th>
                <th>Category</th>
                <th>Slug</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->slug }}</td>
                    <td>{{ $category->status === 1 ? 'Active' : 'Inactive'  }}</td>
                    <td>
                        <a href="{{ route('categories.show', $category->id) }}" class="btn btn-info">
                            Details
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {!! $categories->links() !!}
    </div>
@stop
