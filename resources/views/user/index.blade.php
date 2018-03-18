@extends('welcome')

@section('content')
<br><br>
            
                    
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