@extends('layouts.developer-layouts')

@section('content')
<div class="container-fluid">
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h4 class="page-title m-0"> Tambah Bahasa Page</h4>
                </div>
                <!-- end col -->
            </div>
            <hr>
            <!-- end row -->
        </div>

          <div class="section-body">

          	<div class="row">
          		<div class="col-md-12">
          			<div class="card">
		                <div class="">
                        </div>
                        <form method="POST" action="">
                            @csrf
                          <div class="card-body">
		                        <h4 class='header-title mt-0'><span>Tambah Bahasa Page</span></h4>
                            {{-- @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif --}}
                            <div class="form-group">
                                <label>Page</label>
                                <select name="halaman" class="form-control">
                                  <option hidden>Pilih Halaman..</option>
                                  <option value="Pesanan Baru">Pesanan Baru</option>
                                  <option value="Riwayat Pesanan">Riwayat Pesanan</option>
                                  <option value="Deposit">Deposit</option>
                                  <option value="Daftar Layanan">Daftar Layanan</option>
                                  <option value="Support">Support</option>
                                  <option value="API">API</option>
                                  <option value="Top 10">Top 10</option>
                                  <option value="Riwayat Aktifitas">Riwayat Aktifitas</option>
                                  <option value="Penggunaan Saldo">Penggunaan Saldo</option>
                                  <option value="Kode Voucher">Kode Voucher</option>
                                  <option value="Terms">Terms</option>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Indonesia</label>
                                        <input type="text" placeholder="Nama kategori.." class="form-control" name="indonesia">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>English</label>
                                        <input type="text" placeholder="Nama kategori.." class="form-control" name="english">
                                    </div>
                                </div>
                            </div>
                            </div>
                          <div class="mr-3 form-group text-right">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                          </div>
                        </form>
		            </div>
          		</div>
          	</div>

          </div>
        </div>
      </div>
</div>
@endsection
