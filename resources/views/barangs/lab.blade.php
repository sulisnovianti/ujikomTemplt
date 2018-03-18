@extends('welcome')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li><a href="{{ url('/home') }}">Dashboard</a></li>
					<li class="active">Barang</li>
				</ul>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h2 class="panel-title">Barang</h2>
					</div>
					
					<div class="panel-body">
						<p> <a class="btn btn-primary" href="{{ url('/admin/barangslab/create') }}">Tambah</a>
						
							</p>
						
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
									<td><a href="{{ route('barangslab.edit', $data->id) }}" class="btn btn-info btn-sm">Edit</a></td>
									<td>
								<form action="{{route('barangslab.destroy', $data->id)}}" method="POST">
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
		</div>
	</div>
@endsection