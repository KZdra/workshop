@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('ADD Users') }}</h1>
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

                    <div class="alert alert-info">
                        Silahkan Tambahkan Pelanggan!
                    </div>

                    <div class="card">
                        <div class="card-body p-0">
                            <div class="p-2">
                                <form method="POST" action="{{ route('customers.update', $cust->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                      <label for="nama" class="form-label">Nama:</label>
                                      <input type="text" class="form-control" name="nama" id="nama" value="{{ old('nama', $cust->nama) }}" >
                                    </div>
                                    <div class="mb-3">
                                      <label for="alamat" class="form-label">Alamat:</label>
                                      <textarea class="form-control" placeholder="Masukan Alamat Disini" name="alamat">{{ old('alamat', $cust->alamat) }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                      <label for="no_telp" class="form-label">No Telepon:</label>
                                      <input type="text" class="form-control" name="no_telp" id="no_telp" value="{{ old('no_telp', $cust->no_telp) }}" >
                                    </div>
                                    <div class="mb-3">
                                      <label for="jenis_kendaraan" class="form-label">Jenis Kendaraan:</label>
                                      <input type="text" class="form-control" name="jenis_kendaraan" id="jenis_kendaraan" value="{{ old('jenis_kendaraan', $cust->jenis_kendaraan) }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="no_kendaraan" class="form-label">No Kendaraan:</label>
                                        <input type="text" class="form-control text-uppercase" name="no_kendaraan" id="no_kendaraan" value="{{ old('no_kendaraan', $cust->no_kendaraan) }}" >
                                    </div>

                                    <button type="submit" class="btn btn-primary">Submit</button>
                                  </form>
                            </div>

                        </div>
                        <!-- /.card-body -->


                            </div>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
