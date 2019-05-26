<!-- 
      
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                    @endauth
                </div>
            @endif

           <div id="app"> -->
           @extends('layouts.app')

            @section('content')

                    <h1 style="text-align:center;" >Čau Upē!</h1>
                    <img src="/kopilde.jpg" style="max-width:70%; display:block; margin:auto;">
           

            @endsection