@extends('welcome')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="{{ url('/home') }}">Dashboard</a></li>
                    <li class="active">User</li>
                </ul>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="panel-title">User</h2>
                    </div>
                                
                    
                    <div class="panel-body">
                        <p> <a class="btn btn-primary" href="{{ url('/admin/user/create') }}">Tambah</a>
                        
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td>Nama</td>
                                    <td>Email</td>
                                    <td>Password</td>
                                    <td colspan="2">Opsi</td>
                                </tr>
                               
                                @foreach($user as $data)
                                <tr>
                                    
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>{{ $data->password }}</td>
                                    
                                    <td>
                                <form action="{{route('user.destroy', $data->id)}}" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token">
                                    <input type="submit" class="btn btn-info btn-sm" value="Delete">
                                    {{csrf_field()}}
                                </form>
                            </td>
                                </tr>
                               
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
@endsection