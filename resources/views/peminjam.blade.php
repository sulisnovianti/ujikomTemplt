@extends('welcome')

@section('content')

<br><br>
                    <div class="panel-body">
                        
                            <br><br>
                        
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td>No</td>
                                    <td>Nama Peminjam</td>
                                    <td>Nama Barang</td>
                                    <td>Tanggal</td>
                                    <td>Opsi</td>
                                </tr>
                                @php
                                $no = 1;
                                @endphp
                                @foreach($barang as $data)
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{$data->name}}</td>
                                    <td>{{ $data->nama_barang }}</td>
                                    <td>{{$data->created_at}}</td> 
                                    
                                    <td><a href="" data-toggle="modal" data-target="#myModal{{$data->id}}" class="btn btn-danger btn-sm">Rusak</a></td>
                                    <td><a href="{{url('/kembali',$data->id)}}" class="btn btn-info btn-sm">Bagus</a></td>
                                    
                                </tr>
                                <div id="myModal{{$data->id}}" class="modal fade" role="dialog">
                                  <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                      
                                      <div class="modal-body">

                                        Anda dikenakan denda sebesar Rp.15.000
                                        <br>
                                        <center>
                                        <a href="{{url('/kembali',$data->id)}}" class="btn btn-danger btn-sm">Bayar</a>
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
