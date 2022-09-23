<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Finances</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body>
    @include('base.header')
    <section style="max-width: 600px; margin: 0 auto" class="card p-5 my-6">
        <p class="title is-4 has-text-centered has-text-weight-bold">
            @yield('title')
        </p>
        @yield('content')
    </section>
    @include('base.footer')
</body>

</html>
