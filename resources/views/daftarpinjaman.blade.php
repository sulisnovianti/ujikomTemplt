@extends('layouts.app')

@section('content')

<br><br>
<div class="panel-body">
<br><br>
<div class="table-responsive">
<table class="table">
<tr>
<button onclick="myFunction()" class="btn btn-info btn-sm">Print this page</button>
<script>
function myFunction() {
window.print();
}
</script>
<td>No</td>
<td>Nama Barang</td>
 <td>Gambar</td>
<td>Tanggal Pinjam</td>
<td>Status</td>
</tr>
                                @php
                                $no = 1;
                                @endphp
                                @foreach($barang as $data)
                                 <tr>
                                     <td>{{$no}}</td>
                                     <td>{{$data->nama_barang}}</td>
                                     <td><img src="{{asset('img/'.$data->cover)}}" style="width: 50px"></td>
                                     
                                     <td>{{$data->pinjam}}</td>
 </tr>
                                 @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
@endsection