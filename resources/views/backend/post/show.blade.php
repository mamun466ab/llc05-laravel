@extends('master')

@section('content')
    <h2>{{ $category->name }}</h2>

    <p>
        ID: {{ $category->id }}
    </p>
    <p>
        Slug: {{ $category->slug }}
    </p>
    <p>
        Status: {{ $category->status === 1 ? 'Active' : 'Inactive' }}
    </p>
    <p>
        Created at: {{ $category->created_at }}
    </p>

    <div>
        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-info btn-block">
            Edit
        </a>
    </div>

    <hr>

    <div>
        <form action="{{ route('categories.delete', $category->id) }}" method="post" onsubmit="return confirm('Are you sure?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-block">
                Delete
            </button>
        </form>
    </div>

    <hr>

    <p>
        <a href="{{ route('categories.index') }}" class="btn btn-primary btn-block">
            Back to Category List
        </a>
    </p>
@stop
