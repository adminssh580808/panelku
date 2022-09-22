@extends('layouts.user-layouts')

@section('content')
<div class="container-fluid">
<div class="row">

    @if(Auth::user()->level == 'Reseller')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md">
                        <div class="home-title c-2">
                            <h2 class="mb-3"><span @selected(true)>Colecall Media</span></h2>
                            <p>
                                Ini Adalah Fitur Istimewa Bagi Seluruh Pengguna Di Colecall Media Untuk Mendapatkan Giveaway Setiap Minggu Hingga Bulan.
                                Fitur Istimewa Ini Dapat Diakses Dengan Gratis Setiap Pengguna Yang Telah Mencapai Target Dari Jumlah Total Order Yang Telah Ditentukan.
                            </p>
                            <br>
                            <h3>Syarat Akses :</h3>
                            <p>- Target Total Order : Rp 300.000 Per Bulan / Melakukan Deposit Rp 300.000 Per Bulan
                            </p>
                            <br>
                            <h3>Info</h3>
                            <p>- Kami Membagikan 5-10 Kode Voucher Per Minggu Dengan Nominal Random Minimal 1.000 - 10.000 <br>
                                - Doorprize 10 Kode Voucher Berisikan Saldo 1.000.000 Setiap Bulan <br>
                                - Tersedianya Kode Voucher Akan Kami Informasikan Secara Realtime Di Chanel Telegram Kami. <br>
                                <a href="#" class="btn btn-info mt-1">Bergabung Chanel Telegram</a>
                            </p>
                            <br>
                            <h3>Ketentuan</h3>
                            <p>
                            Jika Pada Bulan Berikutnya Total Order Tidak Mencapai Target Maka Fitur Akan Otomatis Tertutup Kembali &amp; Jika Mencapai Target, Maka Otomatis Fitur Dapat Diakses Kembali.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h3 class="page-title m-0"><b>{{ __('Voucher') }}</b></h3>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <hr>
          <div class="section-body mt-2">

          	<div class="row">
          		<div class="col-md-7">
          			<div class="card">
                      <form method="POST" action="">
                        @csrf
                          <div class="card-body">
		                      <h4 class='header-title mt-0'><span>{{ __('Tukar Kode Voucher') }}</span></h4>
			              	@if(session('success'))
		                        <div class="alert alert-primary" role="alert">
		                            <i class="fa fa-check-circle"></i> {!! session('success') !!}
		                        </div>
			              	@elseif(session('danger'))
		                        <div class="alert alert-danger" role="alert">
		                            <i class="fa fa-exclamation-circle"></i> <div class="p-1"> {{ session('danger') }} </div>
		                        </div>
		                    @endif
		                    @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
			                <div class="form-group">
		                      <label class="mb-1">{{ __('Kode Voucher') }}</label>
		                      <input type="text" name="code" class="form-control" placeholder="Masukkan kode voucher">
		                    </div>
		                    <div id="information">

		                    </div>
                            <div class="form-group mt-2 text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
			              </div>
		              </form>
		            </div>
          		</div>
          		<div class="col-md-5">
          			<div class="card">
                        <div class="card-body">
          					<h4 class='header-title mt-0'><span>{{ __('Panduan') }}</span></h4>
          					<ol>
          						<li>Kode voucher hanya dapat digunakan satu kali</li>
                      <li>Saldo akan ditambahkan jika submit kode voucher berhasil</li>
          					</ol>
          				</div>
          			</div>
          		</div>
          	</div>

          </div>
    </div>
    @endif
    <div class="col-12">
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-md-12 text-center">
                    <h3 class="page-title m-0 bg-gradient-primary text-light p-1"><strong>{{ __('Top 10 Giveaway Voucher Jackpot') }}</strong></h3>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <hr>
        <div class="card mt-2">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>{{ __('Pengguna') }}</th>
                            <th>{{ __('Code Voucer') }}</th>
                            <th>{{ __('Mendapatkan') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($top_giveaway as $giveaway)
                              <tr>
                                  <td>1</td>
                                  <td>{{ $giveaway->name1 }}</td>
                                  <td>{{ $giveaway->code1 }}</td>
                                  <td>{{ config('web_config')['CURRENCY_CODE'] }} {{ Numberize::make($giveaway->total1) }}</td>
                              </tr>
                              <tr>
                                <td>2</td>
                                <td>{{ $giveaway->name2 }}</td>
                                <td>{{ $giveaway->code2 }}</td>
                                <td>{{ config('web_config')['CURRENCY_CODE'] }} {{ Numberize::make($giveaway->total2) }}</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>{{ $giveaway->name3 }}</td>
                                <td>{{ $giveaway->code3 }}</td>
                                <td>{{ config('web_config')['CURRENCY_CODE'] }} {{ Numberize::make($giveaway->total3) }}</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>{{ $giveaway->name4 }}</td>
                                <td>{{ $giveaway->code4 }}</td>
                                <td>{{ config('web_config')['CURRENCY_CODE'] }} {{ Numberize::make($giveaway->total4) }}</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>{{ $giveaway->name5 }}</td>
                                <td>{{ $giveaway->code5 }}</td>
                                <td>{{ config('web_config')['CURRENCY_CODE'] }} {{ Numberize::make($giveaway->total5) }}</td>
                            </tr>
                              @endforeach
                              @forelse($top_giveaway as $giveaway)
                              @empty
                              <tr>
                                  <td colspan="4" class="text-center">No data</td>
                              </tr>
                              @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>




</div>
@endsection
