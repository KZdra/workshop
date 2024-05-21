@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Daftar Transaksi') }}</h1>
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
                    @if (Auth::user()->role == 'kasir' || Auth::user()->role == 'admin')

                    <a href="{{route('transactions.create')}}" class="btn btn-success mb-2">Tambah transaksi</a>
                    @endif
                    {{-- <div class="alert alert-info">
                        Sample table page
                    </div> --}}

                    <div class="card">
                        <div class="card-body p-3">
                            <div class="table-responsive">
                                <table class="table" id="mytable">
                                    <thead>
                                        <tr>
                                            <th>ID_transaksi</th>
                                            <th>Nama Customer</th>
                                            <th>Nama Kasir</th>
                                            <th>Jasa yang Dipakai</th>
                                            <th>Sparepart yang Dibeli</th>
                                            <th>Total Harga</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($transactions as $transaction)
                                            <tr>
                                                <td>{{ $transaction->id }}</td>
                                                <td>{{ $transaction->customer->nama }}</td>
                                                <td>{{ $transaction->user->name }}</td>
                                                <td>{{ $transaction->jasa->nama_jasa }}</td>
                                                <td>{{ $transaction->sparepart->nama_sparepart }}</td>
                                                <td>{{ $transaction->formatted_price }}</td>
                                                <td>
                                                    <a href="{{route('transactions.show', $transaction->id)}}" class="btn btn-info"><i class="fas fa-print"></i></a>
                                                    @if (Auth::user()->role == 'kasir' || Auth::user()->role == 'admin')

                                                    <form action="{{ route('transactions.destroy', $transaction->id) }}" onsubmit="return confirm('Apakah Anda Yakin ?');" method="POST" style="display:inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                                    </form>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer clearfix">
                            {{-- {{ $users->links() }} --}}
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
