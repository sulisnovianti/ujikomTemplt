@extends('layouts.app')
@yield('content')
@section('content')
<br><br>
                    <div class="panel-body">
                        
                            <br><br>
                        
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td>No</td>
                                    <td>Nama Barang</td>
                                    <td>Stok</td>
                                    <td>Gambar</td>
                                    <td>Opsi</td>
                                </tr>
                                @php
                                $no = 1;
                                @endphp
                                @foreach($barang as $data)
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $data->nama_barang }}</td>
                                    <td>{{ $data->amount }}</td>
                                    <td><a href="" data-toggle="modal" data-target="#myModal{{$data->id}}"> <img src="{{asset('img/'.$data->cover.'')}}" width="50" height="50"></a></td>
                                    @if($data->amount !=0)
                                    <td><a href="{{ route('guest.barangs.borrow', $data->id) }}" class="btn btn-info btn-sm">Pinjam</a></td>
                                    @endif
                                </tr>
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
                                @php
                                $no++;
                                @endphp
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
@endsection