@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Tambah Transaksi') }}</h1>
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
                                <form method="POST" action="{{ route('transactions.store') }}" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <label for="user_id">Nama Kasir</label>
                                        <input type="text" value="{{auth::user()->name}}" name="nama_kasir" readonly class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="customer_id">Nama Customer</label>
                                        <select name="customer_id" id="customer_id" class="form-control">
                                            @foreach($customers as $customer)
                                                <option value="{{ $customer->id }}" {{ (isset($transaction) && $transaction->customer_id == $customer->id) ? 'selected' : '' }}>
                                                    {{ $customer->nama  }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label for="jasa_id">Jasa yang Dipakai</label>
                                        <select name="jasa_id" id="jasa_id" class="form-control">
                                            @foreach($jasas as $jasa)
                                                <option value="{{ $jasa->id }}" {{ (isset($transaction) && $transaction->jasa_id == $jasa->id) ? 'selected' : '' }}>
                                                    {{ $jasa->nama_jasa .' - ' . $jasa->formatted_price }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="sparepart_id">Sparepart yang Dibeli</label>
                                        <select name="sparepart_id" id="sparepart_id" class="form-control">
                                            @foreach($spareparts as $sparepart)
                                                <option value="{{ $sparepart->id }}" {{ (isset($transaction) && $transaction->sparepart_id == $sparepart->id) ? 'selected' : '' }}>
                                                    {{ $sparepart->nama_sparepart .' - ' . $sparepart->formatted_price }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    {{-- <div class="form-group">
                                        <label for="total_harga">Total Harga</label>
                                        <input type="text" name="total_harga" id="total_harga" class="form-control" value="{{ old('total_harga', isset($transaction) ? $transaction->total_harga : '') }}">
                                    </div> --}}
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
