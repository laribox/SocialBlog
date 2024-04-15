<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/app.css') }}">
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">

    <title>Social Blog</title>

</head>
<body>
    @include('partials.nav')

    <div class="container"  >
        @yield('content')
    </div>

    @include('partials.footer')

    <script src="{{ asset('assets/app.js') }}"></script>
</body>

</html>
