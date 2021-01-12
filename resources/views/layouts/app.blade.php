
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>PartyPlanner</title>

    <link rel="icon" href="{{asset('images/favicon.png')}}">
    
    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700">
    <link rel="stylesheet" href="{{asset('assets/css/Animation-Cards-1.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/Animation-Cards.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/css/pikaday.min.css">
    <link rel="stylesheet" href="{{asset('assets/css/Login-Form-Clean.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/Registration-Form-with-Photo.css')}}">

    <link href="{{asset('bootstrap-toastr/toastr.min.css')}}" rel="stylesheet" type="text/css">

    @yield('style')

</head>

<body>

    <nav class="navbar navbar-dark navbar-expand-lg bg-white portfolio-navbar gradient">
        <div class="container"><a class="navbar-brand logo" href="{{asset('')}}">Party Planner</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navbarNav"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div
                    class="collapse navbar-collapse" id="navbarNav">
                <ul class="nav navbar-nav ml-auto">


                    @if (Auth::guest())
                        <li class="nav-item" role="presentation"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link active" href="{{ route('login') }}">LogIn</a></li>
                    @else
                        <li class="nav-item" role="presentation"><span style="font-size: 25px"><b>{{Auth::user()->first_name}} {{Auth::user()->last_name}}</b></span></li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>

                        </li>

                    @endif

                </ul>
            </div>
        </div>
    </nav>


    @yield('content')


    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/bs-animation.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/pikaday.min.js"></script>
    <script src="{{asset('assets/js/theme.js')}}"></script>

    <script src="{{asset('bootstrap-toastr/toastr.min.js')}}" type="text/javascript"></script>

    @yield('script')

</body>

</html>