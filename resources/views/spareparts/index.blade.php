@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Spareparts') }}</h1>
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
                    @if (Auth::user()->role == 'gudang' || Auth::user()->role == 'admin')
                    <a href="{{ route('spareparts.create') }}" class="btn btn-success mb-2">Tambah Spareparts</a>
                    @endif

                    <div class="card">
                        <div class="card-body p-3">
                            <div class="table-responsive">
                                <table id="mytable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID_barang</th>
                                            <th>Nama Sparepart</th>
                                            <th>Deskripsi</th>
                                            <th>Stok</th>
                                            <th>Harga</th>
                                            <th>Image</th>
                                            @if (Auth::user()->role == 'gudang' || Auth::user()->role == 'admin')

                                            <th>Action</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($spareparts as $sparepart)
                                            <tr>
                                                <td>{{ $sparepart->id }}</td>
                                                <td>{{ $sparepart->nama_sparepart }}</td>
                                                <td>{{ $sparepart->deskripsi }}</td>
                                                <td>{{ $sparepart->stok }}</td>
                                                <td>{{ $sparepart->formatted_price }}</td>
                                                <td><img class="img-fluid" src="{{ asset('storage/images/' . $sparepart->img) }}" height="200" width="200"></td>
                                                @if (Auth::user()->role == 'gudang' || Auth::user()->role == 'admin')
                                                <td class="text-center">
                                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('spareparts.destroy', $sparepart->id) }}" method="POST">
                                                        <a href="{{ route('spareparts.edit', $sparepart->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                                    </form>
                                                </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        {{-- <div class="card-footer clearfix">
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
