@extends('welcome')

@section('content')
<br><br>
			
					
					<div class="panel-body">
						
						<div class="table-responsive">
							<table class="table">
								<tr>
									<td>No</td>
									<td>Gambar</td>
									<td>Nama Barang</td>
									<td>Nama Peminjam</td>
								</tr>
								@php
								$no = 1;
								@endphp
								@foreach($pinjaman as $data)
								<tr>
									<td>{{$no}}</td>
									<td><img src="{{asset('img/'.$data->cover)}}" style="width: 50px"></td>
									<td>{{$data->nama_barang}}</td>
									<td>{{$data->name}}</td>
								</tr>
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