@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Jasa') }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    {{-- <div class="alert alert-info">

                    </div> --}}
                    <a href="{{route('jasas.create')}}" class="btn btn-success mb-2">Tambah Jasa</a>

                    <div class="card">
                        <div class="card-body p-3">
                            <table class="table"  id="mytable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama Jasa</th>
                                        <th>harga</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($jasas as $jasa )


                                        <td>{{$jasa->id}}</td>
                                        <td>{{$jasa->nama_jasa}}</td>
                                        <td>{{$jasa->formatted_price}}</td>
                                        <td>
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{route('jasas.destroy', $jasa->id)}}" method="POST">
                                                <a href="{{route('jasas.edit', $jasa->id)}}" class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            </form>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
{{--
                        <div class="card-footer clearfix">
                            {{ $users->links() }}
                        </div> --}}
                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
