@extends('templet')
@yield('content')
@section('content')

<center><h3 class="my-4text-center text-lg-left"></h3></center>

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
           <td>{{ $data->amount }}</td>



                                    <!-- <td><a href="" data-toggle="modal" data-target="#myModal{{$data->id}}"> <img src="{{asset('img/'.$data->cover.'')}}" width="50" height="50"></a></td> -->
            @if($data->amount !=0)
            <td><a href="{{ route('guest.barangs.borrow', $data->id) }}" class="btn btn-info btn-sm">Pinjam</a></td>
            @endif
          
      

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
     

           
                             

  </div>
@endforeach
</div>
                               
                          
@endsection