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
      <hr>
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
        <hr>

        <div class="row" style="justify-content: center;">
        	<div class="col-md-7">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('Sosial Media') }}</h4>
                        <div class="basic-modal">
                            <a href="#scrollspyHeading1" class="nav-link btn btn-outline-primary btn-sm">{{ __('Cara Pemesanan') }}</a>
                            <!-- Modal -->
                            <div class="modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel1">{{ __('Cara Pemesanan') }}</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <ul class="nav nav-tabs" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="homeIcon-tab" data-toggle="tab" href="#homeIcon" aria-controls="home" role="tab" aria-selected="true"><i data-feather='alert-circle'></i> {{ __('Pemesanan') }}</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="profileIcon-tab" data-toggle="tab" href="#profileIcon" aria-controls="profile" role="tab" aria-selected="false"><i data-feather='alert-circle'></i> {{ __('Cara Mengisi Target') }}</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="homeIcon" aria-labelledby="homeIcon-tab" role="tabpanel">
                                                    @if(Auth::user()->bahasa == 'id')
                                                    <p>
                                                        Pastikan Anda Memiliki Saldo Yang Cukup Untuk Melakukan Pemesanan. Jika Anda Tidak Memiliki Saldo, Silakan Klik Fitur Deposit<br>
                                                        Jika Sudah Memiliki Saldo, Anda Sudah Bisa Melakukan Pemesanan.<br><br>
                                                        Langkah Pemesanan :
                                                        <ol>
                                                            <li>Pilih Kategori Sesuai Keinginan Anda <br>
                                                                - Garansi : Kami Akan Mengisi Ulang Pesanan Anda Jika Drop Pada Pesanan Anda <br>
                                                                - Tidak Bergaransi : Kami Tidak Memberikan Garansi Apabila Pesanan Anda Terjadi Drop
                                                            </li>
                                                            <li>Pilih Layanan
                                                                - Layanan Adalah Sebuah Kualitas Pesanan Anda
                                                            </li>
                                                            <li>Masukkan Target Sesuai Aturan. <br> Selengkapnya: Klik Cara Mengisi Target</a></li>
                                                            <li>Masukkan Jumlah Pesanan</li>
                                                            <li>Tekan Tombol Submit</li>
                                                        </ol>
                                                    </p>
                                                    @else
                                                    <p>
                                                        Make sure you have enough balance to place an order. If you don't have a balance, please click the Add Funds feature<br>
                                                        If you already have a balance, you can already place an order.<br><br>
                                                        Order Steps:
                                                        <ol>
                                                            <li>Choose the Category You Want <br>
                                                                - Guarantee: We Will Refill Your Order If It Drops On Your Order <br>
                                                                - No Guarantee: We Don't Give A Guarantee If Your Order Drops
                                                            </li>
                                                            <li>Select Service
                                                                - Service Is A Quality Of Your Order
                                                            </li>
                                                            <li>Enter Target According to Rules. <br> More: Click How to Fill Target</a></li>
                                                            <li>Enter Order Quantity</li>
                                                            <li>Press Submit Button</li>
                                                    </p>
                                                    @endif

                                                </div>
                                                <div class="tab-pane" id="profileIcon" aria-labelledby="profileIcon-tab" role="tabpanel">
                                                    @if (Auth::user()->bahasa == 'id')
                                                    <p>Format Pengisian Link / Target yang Benar</p>
                                                    <p>Berikut adalah Contoh Format Pengisian Link / Target yang baik dan benar di menu order Toko Instagram. Harap dicermati dengan baik jika belum mengerti untuk kelancaran Order. </p>
                                                    <p>Pastikan juga Akun tidak di private dan posting wajib bersifat Publik, berlaku untuk semua layanan.</p>
                                                    <ol>
                                                        <li>Instagram</li>
                                                        <ul>
                                                            <li>Instagram Followers / Story Views / Highlight Views / Live Video = <b>Username / Link Profile</b></li>
                                                            <li>Instagram Likes / Views / Comments / Impressions / Saves = <b>Link Post</b> </li>
                                                            <li>Instagram Story Poll Votes = Format input menyesuaikan dengan apa yang di Vote. Contoh Untuk input Option 1: tokoinstangram?vote=1 Option 2: tokoinstangram?vote=2 </li>
                                                            <li>Instagram TV = Link video bisa didapatkan pada Menu TV di app Instagram, Anda harus punya channel IGTV dulu https://www.instagram.com/tv/BlD4FtaAz43/</li>
                                                        </ul>
                                                        <li>Youtube</li>
                                                        <ul>
                                                            <li>Youtube Subscribers = https://www.youtube.com/channel/UCrHxGWDtYeC5Hf7exqJ2ylw.</li>
                                                            <li>Youtube Views / Shares / Comments / Likes dan DisLikes Video = Pastikan video terlihat untuk semua https://www.youtube.com/watch?v=nuBssyIsPdw untuk comments komentar video harus aktif, untuk Likes dan DisLikes pastikan jumlah nya terlihat</li>
                                                            <li>Youtube Comment Likes = Kirim link komentar bukan video, klik pada waktu komentar hingga muncul highliht comment https://www.youtube.com/watch?v=dZ4O5tSO7I0&lc=UgwT6H8B3v6dXMztnZd4AaABAg.</li>
                                                        </ul>
                                                    <p>Ingin Bertanya Hal Lain? Silahkan Hubungi Admin.</p>
                                                    @else
                                                    <p>Correct Link / Target Filling Format</p>
                                                    <p>Here is an example of a good and correct Link / Target Filling Format in the Instagram Store order menu. Please pay close attention if you don't understand for a smooth order. </p>
                                                    <p>Also make sure the account is not private and posts must be public, applicable to all services.</p>
                                                    <ol>
                                                        <li>Instagram</li>
                                                        <ul>
                                                            <li>Instagram Followers / Story Views / Highlight Views / Live Video = <b>Username / Profile Link</b></li>
                                                            <li>Instagram Likes / Views / Comments / Impressions / Saves = <b>Post Links</b> </li>
                                                            <li>Instagram Story Poll Votes = Input format according to what is voted on. Example For input Option 1: tokoinstangram?vote=1 Option 2: tokoinstangram?vote=2 </li>
                                                            <li>Instagram TV = Video links can be found on the TV Menu in the Instagram app, you must first have an IGTV channel https://www.instagram.com/tv/BlD4FtaAz43/</li>
                                                        </ul>
                                                        <li>Youtube</li>
                                                        <ul>
                                                            <li>Youtube Subscribers = https://www.youtube.com/channel/UCrHxGWDtYeC5Hf7exqJ2ylw.</li>
                                                            <li>Youtube Views / Shares / Comments / Likes and DisLikes Video = Make sure the video is visible to all https://www.youtube.com/watch?v=nuBssyIsPdw for comments video comments must be active, for Likes and DisLikes make sure the number is visible </li>
                                                            <li>Youtube Comment Likes = Send a comment link not a video, click on the comment time until the comment highlight appears https://www.youtube.com/watch?v=dZ4O5tSO7I0&lc=UgwT6H8B3v6dXMztnZd4AaABAg.</li>
                                                        </ul>
                                                        <p>Want to Ask Something Else? Please Contact Admin.</p>
                                                    @endif
                                                    </ol>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">{{ __('Mengerti') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
		              <form method="POST" action="">




		              	@csrf
			              	@if(session('success'))
                              <div class="alert alert-success" role="alert">
                                <h4 class="alert-heading">Gagal</h4>
                                <div class="alert-body">
                                    <i class="fa fa-check-circle"></i> {!! session('success') !!}
                                </div>
                            </div>
			              	@elseif(session('danger'))
                              <div class="alert alert-danger" role="alert">
                                <h4 class="alert-heading">Gagal</h4>
                                <div class="alert-body">
                                    <i class="fa fa-exclamation-circle"></i> {{ session('danger') }}
                                </div>
                            </div>
		                    @endif
		                    @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                <h4 class="alert-heading">Gagal</h4>
                                <div class="alert-body">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            @endif
			                <div class="form-group">
		                      <label>{{ __('Kategori') }}</label>
		                      <select class="form-control select2" id="category">
		                        <option>{{ __('Pilih salah satu..') }}</option>
		                        @foreach($cat as $data_category)
		                        	<option value="{{ $data_category->id }}">{{ $data_category->name }}</option>
		                        @endforeach
		                      </select>
		                    </div>
			                <div class="form-group">
		                      <label>{{ __('Layanan') }}</label>
		                      <select class="form-control select2" id="service" name="service">
		                        <option value="">{{ __('Pilih kategori terlebih dahulu') }}</option>
		                      </select>
		                    </div>
		                    <div id="information">

		                    </div>
			                <div class="form-group">
		                      <label>{{ __('Target (BACA INFORMASI LAYANAN)') }}	</label>
		                      <input type="text" class="form-control" name="target">
		                    </div>
		                    <div id="additional">
		                    	<div class="form-group"  id="custom_comment" style="display: none">
			                    	<label>Custom Comment (1 komen = 1 baris)</label>
			                    	<textarea class="form-control" placeholder="Masukkan komentar per baris" name="custom_comment" id="t_custom_comment"></textarea>
		                    	</div>
		                    	<div class="form-group" id="comment_likes"  style="display: none">
			                    	<label>Username</label>
			                    	<input type="text" class="form-control" name="username" placeholder="Masukkan username yang melakukan komentar">
		                    	</div>
		                    </div>
		                    <input type="hidden" name="price" id="price">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>{{ __('Quantity') }}</label>
                                        <input type="number" class="form-control" id="quantity" name="quantity">
                                      </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>{{ __('Total Price') }}</label>
                                        <input type="number" class="form-control" id="total" readonly>
                                      </div>
                                </div>
                            </div>
			              </div>
			              <div class="form-group mr-3  text-right">
			                <button type="submit" class="btn btn-primary">Submit</button>
			              </div>
		              </form>
	          	</div>
	      	</div>
            <div class="col-md-5">
                <div class="card" id="scrollspyHeading1">
                    <div class="card-body">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" aria-controls="home" role="tab" aria-selected="true">How To Order</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" aria-controls="profile" role="tab" aria-selected="false">Fill Target</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="home" aria-labelledby="home-tab" role="tabpanel">
                                @if(Auth::user()->bahasa == 'id')
                                <p>
                                    Pastikan Anda Memiliki Saldo Yang Cukup Untuk Melakukan Pemesanan. Jika Anda Tidak Memiliki Saldo, Silakan Klik Fitur Deposit<br>
                                    Jika Sudah Memiliki Saldo, Anda Sudah Bisa Melakukan Pemesanan.<br><br>
                                    Langkah Pemesanan :
                                    <ol>
                                        <li>Pilih Kategori Sesuai Keinginan Anda <br>
                                            - Garansi : Kami Akan Mengisi Ulang Pesanan Anda Jika Drop Pada Pesanan Anda <br>
                                            - Tidak Bergaransi : Kami Tidak Memberikan Garansi Apabila Pesanan Anda Terjadi Drop
                                        </li>
                                        <li>Pilih Layanan
                                            - Layanan Adalah Sebuah Kualitas Pesanan Anda
                                        </li>
                                        <li>Masukkan Target Sesuai Aturan. <br> Selengkapnya: <a id="profile-tab" data-toggle="tab" href="#profile" aria-controls="profile" role="tab" aria-selected="false">Mengisi Target</a></li>
                                        <li>Masukkan Jumlah Pesanan</li>
                                        <li>Tekan Tombol Submit</li>
                                    </ol>
                                </p>
                                @else
                                <p>
                                    Make sure you have enough balance to place an order. If you don't have a balance, please click the Add Funds feature<br>
                                    If you already have a balance, you can already place an order.<br><br>
                                    Order Steps:
                                    <ol>
                                        <li>Choose the Category You Want <br>
                                            - Guarantee: We Will Refill Your Order If It Drops On Your Order <br>
                                            - No Guarantee: We Don't Give A Guarantee If Your Order Drops
                                        </li>
                                        <li>Select Service
                                            - Service Is A Quality Of Your Order
                                        </li>
                                        <li>Enter Target According to Rules. <br> More: Click <a id="profile-tab" data-toggle="tab" href="#profile" aria-controls="profile" role="tab" aria-selected="false">Fill Target</a></a></li>
                                        <li>Enter Order Quantity</li>
                                        <li>Press Submit Button</li>
                                </p>
                                @endif
                            </div>
                            <div class="tab-pane" id="profile" aria-labelledby="profile-tab" role="tabpanel">
                                @if (Auth::user()->bahasa == 'id')
                                <p>Format Pengisian Link / Target yang Benar</p>
                                <p>Berikut adalah Contoh Format Pengisian Link / Target yang baik dan benar di menu order Toko Instagram. Harap dicermati dengan baik jika belum mengerti untuk kelancaran Order. </p>
                                <p>Pastikan juga Akun tidak di private dan posting wajib bersifat Publik, berlaku untuk semua layanan.</p>
                                <ol>
                                    <li>Instagram</li>
                                    <ul>
                                        <li>Instagram Followers / Story Views / Highlight Views / Live Video = <b>Username / Link Profile</b></li>
                                        <li>Instagram Likes / Views / Comments / Impressions / Saves = <b>Link Post</b> </li>
                                        <li>Instagram Story Poll Votes = Format input menyesuaikan dengan apa yang di Vote. Contoh Untuk input Option 1: tokoinstangram?vote=1 Option 2: tokoinstangram?vote=2 </li>
                                        <li>Instagram TV = Link video bisa didapatkan pada Menu TV di app Instagram, Anda harus punya channel IGTV dulu https://www.instagram.com/tv/BlD4FtaAz43/</li>
                                    </ul>
                                    <li>Youtube</li>
                                    <ul>
                                        <li>Youtube Subscribers = https://www.youtube.com/channel/UCrHxGWDtYeC5Hf7exqJ2ylw.</li>
                                        <li>Youtube Views / Shares / Comments / Likes dan DisLikes Video = Pastikan video terlihat untuk semua https://www.youtube.com/watch?v=nuBssyIsPdw untuk comments komentar video harus aktif, untuk Likes dan DisLikes pastikan jumlah nya terlihat</li>
                                        <li>Youtube Comment Likes = Kirim link komentar bukan video, klik pada waktu komentar hingga muncul highliht comment https://www.youtube.com/watch?v=dZ4O5tSO7I0&lc=UgwT6H8B3v6dXMztnZd4AaABAg.</li>
                                    </ul>
                                </ol>
                                <p>Ingin Bertanya Hal Lain? Silahkan Hubungi Admin.</p>
                                @else
                                <p>Correct Link / Target Filling Format</p>
                                <p>Here is an example of a good and correct Link / Target Filling Format in the Instagram Store order menu. Please pay close attention if you don't understand for a smooth order. </p>
                                <p>Also make sure the account is not private and posts must be public, applicable to all services.</p>
                                <ol>
                                    <li>Instagram</li>
                                    <ul>
                                        <li>Instagram Followers / Story Views / Highlight Views / Live Video = <b>Username / Profile Link</b></li>
                                        <li>Instagram Likes / Views / Comments / Impressions / Saves = <b>Post Links</b> </li>
                                        <li>Instagram Story Poll Votes = Input format according to what is voted on. Example For input Option 1: tokoinstangram?vote=1 Option 2: tokoinstangram?vote=2 </li>
                                        <li>Instagram TV = Video links can be found on the TV Menu in the Instagram app, you must first have an IGTV channel https://www.instagram.com/tv/BlD4FtaAz43/</li>
                                    </ul>
                                    <li>Youtube</li>
                                    <ul>
                                        <li>Youtube Subscribers = https://www.youtube.com/channel/UCrHxGWDtYeC5Hf7exqJ2ylw.</li>
                                        <li>Youtube Views / Shares / Comments / Likes and DisLikes Video = Make sure the video is visible to all https://www.youtube.com/watch?v=nuBssyIsPdw for comments video comments must be active, for Likes and DisLikes make sure the number is visible </li>
                                        <li>Youtube Comment Likes = Send a comment link not a video, click on the comment time until the comment highlight appears https://www.youtube.com/watch?v=dZ4O5tSO7I0&lc=UgwT6H8B3v6dXMztnZd4AaABAg.</li>
                                    </ul>
                                </ol>
                                    <p>Want to Ask Something Else? Please Contact Admin.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>


</div>
@endsection
@push('scripts')
	<script type="text/javascript" src="{{ asset('js/order_sosmed.js') }}"></script>
@endpush
