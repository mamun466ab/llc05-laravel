@extends('master')

@section('content')
    <h2>Login to account</h2>
    <form action="{{ route('login') }}" method="post">
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
            <label for="exampleInputEmail1">Email address</label>
            <input type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter email">
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password">
        </div>

        <button type="submit" class="btn btn-primary">Sign in</button>
    </form>
@stop
