@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Edit Jasa') }}</h1>
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



                    <div class="card">
                        <div class="card-body p-0">
                            <div class="p-2">
                                <form method="POST" action="{{ route('jasas.update', $jasas->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                      <label for="nama_jasa" class="form-label">Nama jasa:</label>
                                      <input type="text" class="form-control" name="nama_jasa" id="nama_jasa" value="{{ old('nama_sparepart', $jasas->nama_jasa) }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Harga</label>

                                        <div class="input-group ">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text">Rp</span>
                                            </div>
                                            <input type="text" class="form-control" name="harga" value="{{ old('harga', $jasas->harga) }}">
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
