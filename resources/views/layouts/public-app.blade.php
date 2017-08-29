<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Trefoil') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>

<body>

    <div id="app" v-cloak>
        @include('layouts._topbar')
        <section class="hero is-primary">
            <!-- Hero header: will stick at the top -->

            <!-- Hero content: will be in the middle -->
            <div class="hero-body">
                <div class="container">
                    <h1 class="title">@yield('title')</h1>
                    <h2 class="subtitle">@yield('subtitle')</h2>
                </div>
            </div>

            @if (session('status'))
            <div class="notification is-success">
                <div class="container">
                    <p class="title is-4">{{ session('status') }}</p>
                </div>

            </div>
            @endif
        </section>
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>
