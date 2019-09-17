<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
   

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.8/styles/atelier-sulphurpool-dark.min.css">

  
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
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
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
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

       @if($errors->count() > 0)
          <ul class="list-group-item">
              @foreach($errors->all() as $error)
                <li class="list-group-item text-danger">
                    {{ $error}}
                </li>
                @endforeach
          </ul>

          <br>
          <br>
          @endif
         

       <!--container-->
       <div class="container">
            <div class="row">
              <div class="col-md-4 py-4">

                <a href="{{ route('discussions.create') }}" class="form-control btn btn-primary">Create a new discussion</a>

              

                <br>

                <br>
               
                <div class="card">
                <div class="card-body">
                    <ul class = "list-group">
                        <li class="list-group-item">
                           <a  href="/forum" style="text-decoration: none;">Home</a>
                        </li>

                        <li class="list-group-item">
                            <a  href="/forum?filter=me" style="text-decoration: none;">My Discussions</a>
                         </li>

                         <li class="list-group-item">
                            <a  href="/forum?filter=solved" style="text-decoration: none;">Answered Discussions</a>
                         </li>

                         <li class="list-group-item">
                            <a  href="/forum?filter=unsolved" style="text-decoration: none;">Unanswered Discussions</a>
                         </li>
                    </ul>
                </div>
            </div>
                <!--home-->

                 @if(Auth::check())
                    @if(Auth::user()->admin)

                    <div class="card-body">
                        <ul class = "list-group">
                            <li class="list-group-item">
                            <a  href="/channels" style="text-decoration: none;">All Channels</a>
                            </li>
                        </ul>
                        </div>

                    @endif
                    @endif



                <div class="card">
                    <div class="card-header">
                        Channels
                    </div>

                    <div class="card-body">
                     
                        <ul class="list-group">
                            
                                @foreach($channels as $channel)
                         
                              <li class="list-group-item">

                                <a href ="{{ route('channel', ['slug' => $channel->slug ]) }}"  style="text-decoration:none;"> {{ $channel->title}} </a>
                            </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
               
              </div>
              <div class="col-md-8 py-4">
                
                @yield('content')
              </div>
            </div>

<!--scripts-->

{{--  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>  --}}
<script type="application/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script  type="application/javascript"src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script  type="application/javascript"src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>     

<script type="application/javascript">
    @if(Session::has('success'))

      toastr.success('{{ Session::get('success') }}')
      
      @endif

</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.8/highlight.min.js"></script>

<script>hljs.initHighlightingOnLoad();</script>




</body>
</html>
