@extends('layouts.app')

@section('content')
    <body>
        <div class="container-fluid text-center">


            <img src="/img/main.png" alt="horse site logo" class="img-fluid" width="300px">
            <!-- <p>Welcome to client administration system. Please login. </p> -->

            <p>Welcome to client administration system.</p>
            @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/home') }}">Manage data</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </body>
@endsection