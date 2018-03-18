<!DOCTYPE HTML>
<html>
<head>
<title>Modern an Admin Panel Category Flat Bootstarp Resposive Website Template | Home :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Modern Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="{{asset('template/css/bootstrap.min.css')}}" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="{{asset('template/css/style.css')}}" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="{{asset('template/css/lines.css')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('template/css/font-awesome.css')}}" rel="stylesheet"> 
<!-- jQuery -->
<script src="{{asset('template/js/jquery.min.js')}}"></script>
<!----webfonts--->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
<!---//webfonts--->  
<!-- Nav CSS -->
<link href="{{asset('template/css/custom.css')}}" rel="stylesheet">
<!-- Metis Menu Plugin JavaScript -->
<script src="{{asset('template/js/metisMenu.min.js')}}"></script>
<script src="{{asset('template/js/custom.js')}}"></script>
<!-- Graph JavaScript -->
<script src="{{asset('template/js/d3.v3.js')}}"></script>
<script src="{{asset('template/js/rickshaw.js')}}"></script>
</head>
<body>
<div id="wrapper">
     <!-- Navigation -->
        <nav class="top1 navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Modern</a>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Daftar</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
			<form class="navbar-form navbar-right">
              <input type="text" class="form-control" value="Search..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search...';}">
            </form>
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <ul class="nav navbar-nav">
                        @if (Auth::check())
                            <li><a href="{{ url('/home') }}">Dashboard</a></li>
                        @endif
                        @role('member')
                            <li><a href="{{ url('/statistik') }}">Peminjaman</a></li>
                        @endrole
                        @role('admin')
                            <li><a href="{{ route('barangs.index') }}">Barang</a></li>
                        @endrole
                        @role('lab')
                            <li><a href="{{ route('barangslab.index') }}">Barang</a></li>
                        @endrole
                        @role('bengkel')
                            <li><a href="{{ route('barangsbengkel.index') }}">Barang</a></li>
                        @endrole
                    </ul>
                        </li>
                       
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        <div id="page-wrapper">

            @yield('content')

        </div>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('template/js/bootstrap.min.js')}}"></script>
</body>
</html>
