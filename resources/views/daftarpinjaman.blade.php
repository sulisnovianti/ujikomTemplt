@extends('templet')

@section('content')



<h1 class="my-4 text-center text-lg-left">Rental Alat Produktif</h1>
<button onclick="myFunction()">Print this page</button>
<script>
    function myFunction(){
        window.print();
    }
</script>
      <div class="row text-center text-lg-left">

        @php
        $no = 1;
        @endphp
        @foreach($barang as $data)
        <div class="col-lg-3 col-md-4 col-xs-6">
          
            <a href="" data-toggle="modal" data-target="#myModal{{$no}}"><img class="img-fluid img-thumbnail" src="{{asset('img/'.$data->cover.'')}}" alt="">
          </a>
           <td>{{ $data->nama_barang }}</td>
           <td>{{ $data->pinjam }}</td>
          
        </div>

        <div id="myModal{{$no}}" class="modal fade" role="dialog">
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
<!--  -->
@endsection