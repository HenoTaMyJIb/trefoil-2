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
    <link href="{{ elixir('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
</head>

<body>
    <section class="hero is-info is-fullheight">
        <div class="hero-body">
            <div class="container">

                <div class="columns">
                    <div class="column is-offset-one-quarter is-half">
                        <h1 class="title"><i class="fa fa-lock"></i> Spordikool Trefoil</h1>
                        <hr/>
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                            {{ csrf_field() }}

                            <label>E-post</label>
                            <p class="control">
                                <input id="email" type="email" class="input{{ $errors->has('email') ? ' is-danger' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                            </p>
                            @if ($errors->has('email'))
                            <span class="help">{{ $errors->first('email') }}</span>
                            @endif

                            <label>Parool</label>
                            <p class="control">
                                <input id="password" type="password" class="input{{ $errors->has('password') ? ' is-danger' : '' }}" name="password" required>
                            </p>
                            @if ($errors->has('password'))
                            <span class="help">{{ $errors->first('password') }}</span>
                            @endif



                            <p class="control">
                                <label class="checkbox">
                                        <input type="checkbox"> Remember me
                                </label>
                            </p>
                            <p class="control">
                                <button class="button is-default">Logi sisse</button>
                            </p>
                            {{-- <a class="btn btn-link" href="{{ url('/password/reset') }}">
                            Forgot Your Password?
                            </a> --}}
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
</body>

</html>
