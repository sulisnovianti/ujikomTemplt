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