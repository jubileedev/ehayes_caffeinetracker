<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/main.css">
        <!-- Styles -->
       
    </head>
    <body class='bg'>
    
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
            <div class="top-left links">
                <a href="/" class='welcomeHeader'>Caffeine Tracker</a>
            </div>
                <div class="top-right links">
                    @auth
                        <a  class='welcomeHeader' href="{{ url('/home') }}">Home</a>
                    @else
                        <a  class='welcomeHeader' href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a  class='welcomeHeader' href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <main role="main" class="inner cover welcomeHeader">
                    <h1 class="cover-heading welcomeHeader font-weight-bold">Track Your Caffeine Intake</h1>
                    <p class="lead font-weight-bold">Caffeine Tracker is your energy-drinkin sidekick to prevent you from overdosing on caffeine</p>
                    <p class="lead welcomeHeader">
                    @auth
                        <a href="{{ route('register') }}" class="btn btn-lg btn-primary">Welcome Back</a>
                    @else
                        <a href="{{ route('register') }}" class="btn btn-lg btn-primary">Register</a>
                    @endauth
                    </p>
                </main>
            </div>
            
        </div>
           <!-- Scripts -->
            <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
