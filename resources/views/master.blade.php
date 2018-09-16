<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//getbootstrap.com/docs/4.1/examples/blog/blog.css">
</head>
<body>

<div class="container">
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


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://getbootstrap.com/docs/4.1/assets/js/vendor/popper.min.js"></script>
<script src="https://getbootstrap.com/docs/4.1/dist/js/bootstrap.min.js"></script>
<script src="https://getbootstrap.com/docs/4.1/assets/js/vendor/holder.min.js"></script>
<script>
    Holder.addTheme('thumb', {
        bg: '#55595c',
        fg: '#eceeef',
        text: 'Thumbnail'
    });
</script>
</body>
</html>
