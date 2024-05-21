@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Tambah Jasa') }}</h1>
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
                        Silahkan Tambahkan Jasa!
                    </div>

                    <div class="card">
                        <div class="card-body p-0">
                            <div class="p-2">
                                <form method="POST" action="{{ route('jasas.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                      <label for="nama_sparepart" class="form-label">Nama Jasa:</label>
                                      <input type="text" class="form-control" name="nama_jasa" id="nama_sparepart" >
                                    </div>
                                    <div class="mb-3">
                                    <label for="">Harga</label>
                                        <div class="input-group ">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text">Rp</span>
                                            </div>
                                            <input type="text" class="form-control" name="harga">
                                          </div>
                                    </div>
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
