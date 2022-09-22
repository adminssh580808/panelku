@extends('layouts.user-layouts')

@section('content')
<div class="container-fluid">
    <div class="row match-height">
    <div class="col-md-12 mb-1">
        <div class="demo-spacing-0">
            <div class="alert alert-primary" role="alert">
                <div class="alert-body text-center">
                    <strong>{{ __('Selamat Datang') }} - {{ Auth::user()->name }} <hr></strong>
                    {{ __('Jika Anda Menggunakan Smartphone Silahkan Scroll Kebawah Untuk Melakukan Pemesanan')}}</div>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="page-title-box">
          <div class="row align-items-center">
              <div class="col-md-8">
                  <h4 class="page-title m-0">{{ __('Profile Information') }}</h4>
              </div>
              <!-- end col -->
          </div>
          <!-- end row -->
      </div>
      <hr class="bg-white">
    </div>
    <div class="col-md-12">
        <div class="row match-height">
            <div class="col-xl-4 col-md-4">
                <div class="card bg-primary mini-stat text-white">
                    <div class="p-1 mini-stat-desc">
                        <div class="clearfix">
                            <h6 class="text-uppercase mt-0 float-left text-white-50">{{ __('Saldo') }}</h6>
                            <h4 class="mb-1 mt-0 text-white float-right">{{ convert(Auth::user()->balance) }}</h4>
                        </div>
                        <div>
                            <a href="{{url('deposit/new')}}" class=" btn btn-outline-light btn-sm">{{ __('Isi Saldo') }}</a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-xl-3 col-md-3">
                <div class="card bg-success mini-stat text-white">
                    <div class="p-1 mini-stat-desc">
                        <div class="clearfix">
                            <h6 class="text-uppercase mt-0 float-left text-white-50">{{ __('ORDER DALAM PROSES') }}</h6>
                            <h4 class="mb-1 mt-0 float-right">{{$pendingprocessing}}</h4>
                        </div>
                        <div>
                            <a href="{{route('sosmed_history')}}" class=" btn btn-outline-light btn-sm">{{ __('Riwayat Order') }}</a>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="col-xl-4 col-md-4">
                <div class="card bg-primary mini-stat text-white">
                    <div class="p-1 mini-stat-desc">
                        <div class="clearfix">
                            <h6 class="text-uppercase mt-0 float-left text-white-50">{{ __('PENGGUNAAN') }}</h6>
                            <h4 class="mb-1 mt-0 text-white float-right">{{ convert($used_balance) }}</h4>
                        </div>
                        <div class="mt-1">
                            <span class="badge badge-light text-primary"> {{Numberize::make($balance_percentage,2)}}% </span> <span class="ml-2">{{ __('Dari bulan lalu') }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-4">
                <div class="card bg-primary mini-stat text-white">
                    <div class="p-1 mini-stat-desc">
                        <div class="clearfix">
                            <h6 class="text-uppercase mt-0 float-left text-white-50">{{ __('ORDER BULAN INI') }}</h6>
                            <h4 class="mb-1 mt-0 float-right">{{$total_order_thismo}}</h4>
                        </div>
                        <div class="mt-1">
                            <span class="badge badge-light text-primary"> +{{$order_percentage}}% </span> <span class="ml-2">{{ __('Dari Bulan Kemarin') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="offcanvas offcanvas-end text-bg-dark" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header mt-1">
            <h3 class="offcanvas-title" id="offcanvasRightLabel">Berita Terbaru</h3>
            <button type="button" class="btn-close bg-light" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <hr class="text-bg-light">
        <div class="offcanvas-body">
        @foreach ($news as $item)
            <div class="toast show toast-wrapper toast-translucent" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <img src="{{config('web_config')['WEB_LOGO_URL']}}" class="mr-1 mb-1 mt-1" alt="Toast image" height="18" width="25" />
                    <strong class="mr-auto mt-1  mb-1">{{ $item->title }}</strong>
                    <small class="text-muted mt-1  mb-1">{{ date('d F Y H:i', strtotime($item->created_at)) }}</small>
                </div>
                <div class="toast-body">{!! nl2br(htmlentities($item->content)) !!}</div>
            </div>
            @endforeach
        </div>

    </div>


    </div>
</div>

    <div class="col-12 mb-3">
      	<div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h4 class="page-title m-0">{{ __('Pemesanan & Informasi') }}</h4>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <div class='alert alert-warning alert-has-icon mt-1'>
            <div class='alert-body'>
                <div class ='alert-title'><span class='alert-icon'><i class='fas fa-info-circle'></i></span> <b>Dimohon Kerjasamanya :</b></div>
                Jika Ada Layanan Yang Tidak Bisa Dipesan / Selalu Gagal, Silahkan Kontak Admin Agar Cepat Diperbaiki.
            </div>
        </div>
      <hr class="bg-white">
      	<div class="row">
      		<div class="col-md-7">
      			<div class="card">
	              
	              <form method="POST" action="">
	              	@csrf
		              <div class="card-body">
	                	<h4 class='header-title mt-0'><span>Pulsa & PPOB</span></h4>
		              	@if(session('success'))
	                        <div class="alert alert-primary" role="alert">
	                            <i class="fa fa-check-circle"></i> {!! session('success') !!}
	                        </div>
		              	@elseif(session('danger'))
	                        <div class="alert alert-danger" role="alert">
	                            <i class="fa fa-exclamation-circle"></i> {!! session('danger') !!}
	                        </div>
	                    @endif
	                    @if ($errors->has('quantity'))
		                    	<div class="alert alert-danger" role="alert">
		                            <i class="fa fa-exclamation-circle"></i> {{ $errors->first('quantity') }}
		                        </div>
						@endif
		                <div class="form-group">
	                      <label>Kategori</label>
	                      <select class="form-control select2" id="category_pulsa">
	                        <option>Pilih salah satu..</option>
	                        @foreach($cat as $data_category)
	                        	<option value="{{ $data_category->id }}">{{ $data_category->name }}</option>
	                        @endforeach
	                      </select>
	                    </div>
		                <div class="form-group">
	                      <label>Operator</label>
	                      <select class="form-control select2" id="operator_pulsa" name="service">
	                        <option value="">Pilih kategori terlebih dahulu</option>
	                      </select>
	                    </div>
		                <div class="form-group">
	                      <label>Layanan</label>
	                      <select class="form-control select2" id="service_pulsa" name="service">
	                        <option value="">Pilih operator terlebih dahulu</option>
	                      </select>
	                    </div>
	                    <div class="form-group">
    	                    <div class='alert alert-primary alert-has-icon'>
                                <div class='alert-body'>
                                    <div class ='alert-title'><span class='alert-icon'><i class='fas fa-info-circle'></i></span> <b>Informasi Layanan</b></div>
                                    <div id="information">
    		                    
    	                            </div>
                                </div>
                            </div>
                        </div>
		                <div class="form-group">
	                      <label>Nomor telepon tujuan 	</label>
	                      <input type="text" class="form-control" name="target" id="tujuan">
	                    </div>
	                    <div class="form-group" id='pln' style='display:none'>
	                      <label>Nomor Meter PLN 	</label>
	                      <input type="text" class="form-control" name="pln" id="plninput">
	                    </div>
	                    
	                    <input type="hidden" name="price" id="price">
		                <div class="form-group">
	                      <label>Total Price</label>
	                      <input type="number" class="form-control" id="total" readonly >
	                    </div>
		              </div>
		              <div class="mr-3 form-group text-right">
		                <button type="submit" class="btn btn-primary">Submit</button>
		              </div>
	              </form>
	            </div>
      		</div>
      		<div class="col-md-5">
      			<div class="card">
      				<div class="card-body">
      					<h4 class='header-title mt-0'><span>Cara Pemesanan</span></h4>
      					<ol>
      						<li>Pilih kategori terlebih dahulu</li>
      						<li>Pilih layanan yang ingin digunakan</li>
      						<li>Masukkan target sesuai aturan. Instagram followers menggunakan username, Selengkapnya: <a href="">Cara memasukkan target</a></li>
      						<li>Masukkan jumlah yang ingin dipesan</li>
      						<li>Tekan tombol submit dan pesanan anda akan segera diproses</li>
      					</ol>
      				</div>
      			</div>
      		</div>
      	</div>
            
  	</div>
</div>

</div>
@endsection
@push('scripts')
	<script type="text/javascript" src="{{ asset('js/order_pulsa.js') }}"></script>
@endpush