<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
    <meta name="_token" content="{{ csrf_token() }}"/>

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">



    <title>Nibla CMS</title>

    <!-- Laravel Assets -->

    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />

     <!-- Main JS File -->
    <script src="{{ asset('js/app.js') }}"></script>

    <script src="https://js.pusher.com/5.0/pusher.min.js"></script>
    <script>

      // Enable pusher logging - don't include this in production
      Pusher.logToConsole = true;

      var pusher = new Pusher('59eb4e2360f50deef69e', {
        cluster: 'eu',
        forceTLS: true
      });

      var channel = pusher.subscribe('my-channel');
      channel.bind('my-event', function(data) {
        alert(JSON.stringify(data));
      });
    </script>
<!-- resources/views/layouts/app.blade.php -->

{{-- <style>
    .chat {
      list-style: none;
      margin: 0;
      padding: 0;
    }

    .chat li {
      margin-bottom: 10px;
      padding-bottom: 5px;
      border-bottom: 1px dotted #B3A9A9;
    }

    .chat li .chat-body p {
      margin: 0;
      color: #777777;
    }

    .panel-body {
      overflow-y: scroll;
      height: 350px;
    }

    ::-webkit-scrollbar-track {
      -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
      background-color: #F5F5F5;
    }

    ::-webkit-scrollbar {
      width: 12px;
      background-color: #F5F5F5;
    }

    ::-webkit-scrollbar-thumb {
      -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
      background-color: #555;
    }
  </style>
<script> --}}
    <script>
        window.Laravel = {!! json_encode([
          'csrfToken' => csrf_token(),
        ]) !!};
      </script>
    <br>
    <!-- Setup Headers -->
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

</head>
<body>
    <div id="app">


            @auth
            <main class="py-4">
                    @include('inc.sideArea')

                    <div class="container-fluid">
                            @include('inc.messages')

                            @include('inc.modal')

                            <div id="app">
                                    <!-- home Vue component -->

                            @yield('main-row')
                        </div>

                    <div class="row">
            </main>
            @endauth
            @guest
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                    <div class="container">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            Nibla CRM
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Left Side Of Navbar -->
                            <ul class="navbar-nav mr-auto">

                            </ul>

                            <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav ml-auto">
                                <!-- Authentication Links -->
                                @guest
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </li>
                                    @endif
                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </nav>
            @endguest
            @yield('content')

    </div>
</body>
</html>

