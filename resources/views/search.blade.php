@extends('layouts.app')

@section('content')
@foreach($barang as $data)
<img src="{{asset('/img/'.$data->cover)}}">
<h1>{{($data->nama_barang)}}</h1>
@endforeach
@endsection