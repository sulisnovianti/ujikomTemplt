<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Thumbnail Gallery - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/thumbnail-gallery.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">

              <a class="nav-link" href="{{ url('/home') }}">Home
                <!-- <span class="sr-only">(current)</span> -->
              </a>
            </li>
            <li class="nav-item">
              @role('member')
              <a class="nav-link" href="{{url('/member/daftarpinjaman')}}">Daftar Pinjaman</a>
               @endrole
            </li>

             @if (Auth::guest())

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
            <<!-- li class="nav-item">
              <a class="nav-link" href="#">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li> -->
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">


      <h1 class="my-4 text-center text-lg-left">Thumbnail Gallery</h1>

      <div class="row text-center text-lg-left">

        @php
        $no = 1;
        @endphp
        @foreach($barang as $data)
        <div class="col-lg-3 col-md-4 col-xs-6">
          
            <a href="" data-toggle="modal" data-target="#myModal{{$data->id}}"><img class="img-fluid img-thumbnail" src="{{asset('img/'.$data->cover.'')}}" alt="">
          </a>
           <td>{{ $data->nama_barang }}</td>
           <td>{{ $data->amount }}</td>
          @if($data->amount !=0)
          <tr>
         <td><a href="{{ route('guest.barangs.borrow', $data->id) }}" class="btn btn-info btn-sm">Pinjam</a></td></tr>
         @endif
        </div>

        <div id="myModal{{$data->id}}" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      
      <div class="modal-body">
      <center>
        <img src="{{asset('img/'.$data->cover.'')}}" width="500">
    </center>
      </div>
      
    </div>

  </div>
</div>
        @endforeach

      </div>
    </div>

    <br>
    <br>
    <!-- /.container -->

    <!-- Footer -->
   <!--  <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
      </div>
      <!-- /.container -->
    </footer>
     <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
