<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('public/js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">


</head>
<style>

 body{
     overflow-x: hidden;
 }


    .ul
    {
        margin:0px;
        padding:0px;
        list-style-type:none;
        list-decoration:none;
        display:block;
        background-color:;


    }
    .ul>li{text-align:center; padding:15px;border:1px solid black ;border-right: 0;}
    .ul>li>a:hover{ text-decoration:none;color:;}
    .ul>li>a{ color:black;font-size:16px}

    .divafterlogin1
    {
        height:750px;
        background-color:;

        margin-top:5px;
        border: 1px solid rgba(0,0,0,.125);


    }
    .divafterlogin2 {
        text-align: center;

    }




</style>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <!-- Brand -->
    <a class="navbar-brand" href="#">Laravel Ecommerce</a>

    <!-- Links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="#"></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#"></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#"></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#"></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
            </a>
        </li>

        <!-- Dropdown -->

    </ul>
</nav>

<div class="row">

    <div class="col-lg-3">
        <div class="divafterlogin1" >

            <div class="divafterlogin2"><br>
                <h3 >welcome :{{Auth::user()->name}}</h3>
            </div><br>
            <ul class="ul">
                <li><a href="{{route('dashboard')}}" ><span class="glyphicon glyphicon-dashboard"></span>  Dashboard</a></li>
                <li><a href="{{route('users')}}" ><span class="glyphicon glyphicon-user"></span>All Users </a></li>
                <li><a href="{{route('create-user')}}"><span  class="glyphicon glyphicon-plus-sign"></span>Create User</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-user"></span>  All Teachers</a></li>
                <li><a href="#"><span  class="glyphicon glyphicon-plus-sign"></span>  Register Teacher</a></li>
{{--                <li><a href="{{route('logout')}}"><span  class="glyphicon glyphicon-log-out"></span>  Log Out</a></li>--}}
                <li>

                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>

            </ul>
        </div>

    </div>

       <div class="col-lg-9">
           @yield('content')

       </div>
</div>

</body>
</html>
