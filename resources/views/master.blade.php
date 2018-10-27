<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ mix('css/blog.css') }}">
</head>
<body>

<div class="container" id="app">
    @include('partials.navbar')

    {{--@includeWhen(request()->is('/'), 'partials.jumbotron')--}}

    <main role="main" class="container">
        <div class="row">
            <div class="col-md-8 blog-main">

                @yield('content')

            </div><!-- /.blog-main -->

            @include('partials.sidebar')

        </div><!-- /.row -->
    </main><!-- /.container -->

    @include('partials.footer')

</div>

<script src="{{ mix('js/app.js') }}"></script>
<script>
    Echo.private('post.created')
        .listen('PostCreated', (e) => {
            $.notify(e.post.title + ' has been published now');
        });
</script>
</body>
</html>
