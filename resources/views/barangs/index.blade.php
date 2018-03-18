@extends('welcome')

@section('content')
<br><br>
			
					
					<div class="panel-body">
						<p> <a class="btn btn-primary" href="{{ url('/admin/barangs/create') }}">Tambah</a>
						
						<div class="table-responsive">
							<table class="table">
								<tr>
									<td>No</td>
									<td>Gambar</td>
									<td>Nama Barang</td>
									<td>Stok</td>
									<td colspan="2">Opsi</td>
								</tr>
								@php
								$no = 1;
								@endphp
								@foreach($barang as $data)
								<tr>
									<td>{{ $no }}</td>
									<td><img src="{{asset('img/'.$data->cover)}}" height="50px"></td>
									<td>{{ $data->nama_barang }}</td>
									<td>{{ $data->amount }}</td>
									<td><a href="{{ route('barangs.edit', $data->id) }}" class="btn btn-warning">Edit</a></td>
									<td>
								<form action="{{route('barangs.destroy', $data->id)}}" method="POST">
									<input type="hidden" name="_method" value="DELETE">
									<input type="hidden" name="_token">
									<input type="submit" class="btn btn-danger" value="Delete">
									{{csrf_field()}}
								</form>
							</td>
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