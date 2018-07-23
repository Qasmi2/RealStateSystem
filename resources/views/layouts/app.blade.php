<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Montviro-BookingPortal') }}</title>

    <!-- external ------->

   

    <link href="{{ URL::to('css/style.css') }}" rel="stylesheet">
    <link href="{{ URL::to('css/all-themes.css') }}" rel="stylesheet" />

    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/stylenadeem.css') }}" rel="stylesheet">

      <!-- javascrip link to delete confirmation form -->
      <!-- javascrip link to delete confirmation form -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
     <!-- Google Fonts -->
     <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md bg-dark navbar-dark navbar-fixed-top" style="background-color:#f44336 !important;position: fixed !important;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    {{ config('app.name', 'Montviro-BookingPortal') }}
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
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('formall') }}">{{ __('Regisration Form') }}</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link" href="{{ route('propertyform') }}">{{ __('Reistration Property') }}</a>
                            </li> -->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('properties') }}">{{ __('Diplay Properties') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('sellerform') }}">{{ __('Seller Regisration Form') }}</a>
                            </li>
                            <!-- <li class="nav-item dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1
                                <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Page 1-1</a></li>
                                    <li><a href="#">Page 1-2</a></li>
                                    <li><a href="#">Page 1-3</a></li>
                                </ul>
                            </li> -->
                            
                            

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
        @auth
        <!-- Left Sidebar -->
        <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12">
        <aside id="leftsidebar" class="sidebar sidebar_block" style="margin-top:-6px;">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="..\public\images\user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <!-- <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</div> -->
                    <div class=" name dropdown">
                                <a style="color:white;"id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="top:157px !important;">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                    </div>
                    
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li>
                        <a href="{{ url('/home') }}">
                            
                            <span>Home</span>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                            
                                <a class="nav-link" href="{{ route('formall') }}">
                              
                                    <span>{{__('Reistration Property')}}</span>
                                </a>
                    </li>
                    <li class="nav-item">
                                <a class="nav-link" href="{{ route('properties') }}">
                              
                                    <span>{{ __('Diplay Properties') }}</span>
                                </a>
                    </li>
                    <li class="nav-item">
                                <a class="nav-link" href="{{ route('sellerform') }}">
                                
                                    <span>{{ __('Seller Registration Form') }}</span>
                                </a>
                    </li>
                    
                    <!-- <li >
                        <a href="" >
                            <i class="material-icons">view_list</i>
                            <span>Prospects Details</span>
                        </a>
                    </li> -->

                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2018 <a href="javascript:void(0);">MONTVIRO- BOOKING PORTAL</a>.
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        </div>
        @endauth

        <main class="py-4" class="content">
            @yield('content')
        </main>
    </div>
  
  <script src="{{ asset('js/app.js') }}" defer></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
