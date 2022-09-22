@extends('layouts.auth')
@section('content')
            <section class="home-head">
                <div class="hh-bg">
                    <img src="{{ asset('asset-landing/cdn.mypanel.link/fsvxaw/1im3m0u2ontk2uy3.png') }}" alt="bg">
                </div>
                <div class="container">
                    <div class="home-head-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="hh-box-title ">
                                    <i class="ri-percent-line icon"></i>
                                    <span class="text">{{ __('Pilihan Provider SMM PANEL Terbaik Anda') }}</span>
                                </div>
                                <!-- ./hh-box-title -->
                                <h1 class="hh-title">
                                    {{ __('Tingkatkan Profile Social Media Anda Bersama') }} <br><span>Colecall Media!</span>
                                </h1>
                                <p class="hh-text">
                                    {{ __('Facebook, Instagram, Youtube, Tiktok, Dan Apapun Itu! Kami Memiliki Lebih Dari 1000 Layanan Untuk Membantu Meningkatkan Profile Social Media Anda Di Berbagai Platform Social Media! Daftar Dan Mulai Sekarang!') }}
                                </p>
                            </div>
                            <div class="col-md-auto">
                            <a href="{{ url('/login') }}" class="btn btn-primary btn-border btn-block">
                                    <span>{{ __('Masuk') }}</span>
                                </a>
                            </div>
                            <div class="col-md-auto mt-3 mt-md-0">
                            <a href="{{ url('/register') }}" class="btn btn-info btn-border btn-block">
                                    <span>{{ __('Daftar') }}</span>
                                </a>
                            </div>
                            <div class="col-md-auto mt-3 mt-md-0">
                                <a href="{{ url('service-landing') }}" class="btn btn-block">
                                    <span>{{ __('Lihat Semua Layanan') }}</span>
                                    <i class="ri-arrow-right-line ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- home-head -->

            <section class="home-platforms">
                <div class="container">
                    <div class="hpla-wrapper">
                        <img src="{{ asset('asset-landing/cdn.smmspot.net/cloutsy/assets/img/platforms/ig.png') }}" style="width: 189px;" alt="ig" class="hpla-item">
                        <img src="{{ asset('asset-landing/cdn.smmspot.net/cloutsy/assets/img/platforms/tiktok.png') }}" style="width: 189px;" alt="ig" class="hpla-item">
                        <img src="{{ asset('asset-landing/cdn.smmspot.net/cloutsy/assets/img/platforms/yt.png') }}" style="width: 189px;" alt="ig" class="hpla-item">
                        <img src="{{ asset('asset-landing/cdn.smmspot.net/cloutsy/assets/img/platforms/tw.png') }}" style="width: 189px;" alt="ig" class="hpla-item">
                        <img src="{{ asset('asset-landing/cdn.smmspot.net/cloutsy/assets/img/platforms/fb.png') }}" style="width: 189px;" alt="ig" class="hpla-item">
                    </div>
                </div>
            </section>

            <section class="home-diff-sec">
                <div class="container">
                    <div class="home-title text-center mb-4">
                        <div class="htbox">
                            <i class="ri-star-smile-line"></i>
                        </div>
                        <h2 class="title">
                            {{ __('Apa Yang Membuat Colecall Media') }} <span>{{ __('Berbeda?') }}</span>
                        </h2>
                    </div>
                    <!-- home-title -->
                    <div class="text-center">
                        <div class="home-text mb-4">
                            {{ __('Menjadi Lebih Mudah Untuk Mendapatkan Dukungan Sosial Media Anda.') }} <br> {{ __('Colecall Media Dirancang Untuk Memberi Anda Apa Yang Anda Inginkan Untuk Kebutuhan Social Media Anda Dengan Layanan SMM Berkualitas Tinggi.') }}
                        </div>
                    </div>
                    <div class="row row-cols-lg-4 row-cols-md-2 row-cols-2 pt-4 diff-row">
                        <div class="col">
                            <div class="diff-card" data-aos="fade-up">
                                <div class="diff-card--icon icon-1">
                                    <i class="ri-cup-line"></i>
                                </div>
                                <h3 class="diff-card--title">{{ __('Layanan Berkualitas') }}</h3>
                                <div class="diff-card--text">{{ __('Kualitas Layanan Kami Membuat Anda Senang.') }}
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col">
                            <div class="diff-card" data-aos="fade-up" data-aos-delay="200">
                                <div class="diff-card--icon icon-2">
                                    <i class="ri-shield-line"></i>
                                </div>
                                <h3 class="diff-card--title">{{ __('Metode Deposit') }}</h3>
                                <div class="diff-card--text">{{ __('Berbagai Macam Metode Deposit Untuk Anda Pilih.') }}
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col">
                            <div class="diff-card" data-aos="fade-up" data-aos-delay="400">
                                <div class="diff-card--icon icon-3">
                                    <i class="ri-price-tag-3-line"></i>
                                </div>
                                <h3 class="diff-card--title">{{ __('Harga Termurah') }}</h3>
                                <div class="diff-card--text">{{ __('Layanan Berkualitas Dengan Harga Termurah.') }}
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col">
                            <div class="diff-card" data-aos="fade-up" data-aos-delay="600">
                                <div class="diff-card--icon icon-4">
                                    <i class="ri-timer-flash-line"></i>
                                </div>
                                <h3 class="diff-card--title">{{ __('Kecepatan Layanan') }}</h3>
                                <div class="diff-card--text">{{ __('Pesanan Anda Sampai Dalam Hitungan Per Detik!') }}
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                    <!-- ./row -->
                </div>
                <!-- container -->
            </section>
            <!-- home-diff-sec -->
            <section class="home-rise-section">
                <div class="container">
                    <div class="hrs-card" data-aos="fade-up">
                        <div class="hrs-content">
                            <div class="row align-items-center mb-5">
                                <div class="col-md">
                                    <div class="home-title c-3">
                                        <h2 class="mb-0">
                                            {{ __('4 Langkah Menggunakan') }} <span>Colecall Media</span>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                            <!-- ./row (card head) -->
                            <div class="row align-items-center">
                                <div class="col-lg-6 col-md-6 mt-4">
                                    <div class="hrs-steps">
                                        <div class="item" data-aos="fade-up" data-aos-delay="400">
                                            <div class="number">
                                                <div class="number-box">1</div>
                                            </div>
                                            <div class="content">
                                                <h4>{{ __('Mendaftar Akun') }}</h4>
                                                <p>{{ __('Mulai Mendaftar Sebelum Login / Masuk.') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 mt-4">
                                    <div class="hrs-steps">
                                        <div class="item" data-aos="fade-up" data-aos-delay="300">
                                            <div class="number">
                                                <div class="number-box">2</div>
                                            </div>
                                            <div class="content">
                                                <h4>{{ __('Deposit') }}</h4>
                                                <p>{{ __('Memilih Metode Deposit Untuk Mengisi Saldo Anda.') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 mt-4">
                                    <div class="hrs-steps">
                                        <div class="item" data-aos="fade-up" data-aos-delay="200">
                                            <div class="number">
                                                <div class="number-box">3</div>
                                            </div>
                                            <div class="content">
                                                <h4>{{ __('Pilih Layanan') }}</h4>
                                                <p>{{ __('Pilih Layanan Apa Yang Social Media Anda Butuhkan.') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 mt-4">
                                    <div class="hrs-steps">
                                        <div class="item" data-aos="fade-up" data-aos-delay="100">
                                            <div class="number">
                                                <div class="number-box">4</div>
                                            </div>
                                            <div class="content">
                                                <h4>{{ __('Enjoy & Dapatkan Hasilnya') }}</h4>
                                                <p>{{ __('Anda Akan Mendapatkan Hasilnya Setelah Pesanan Anda Selesai.') }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="home-section">
                <div class="container">
                    <div class="row row-cols-lg-3 row-cols-md-2 row-cols-1">
                        <div class="col">
                            <div class="card card-border card-hobo card-1" data-aos="fade-up" data-aos-delay="0">
                                <div class="card-body">
                                    <div class="c-head">
                                        <div>
                                            <i class="ri-wallet-3-line icon"></i>
                                        </div>
                                        <div class="title">{{ __('Harga Bersahabat') }}</div>
                                    </div>
                                    <div class="c-text">
                                        {{ __('Dapatkan Harga Layanan Mulai Dari Rp 10 Rupiah') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- .item -->
                        <div class="col">
                            <div class="card card-border card-hobo card-2" data-aos="fade-up" data-aos-delay="150">
                                <div class="card-body">
                                    <div class="c-head">
                                        <div>
                                            <i class="ri-flashlight-line icon"></i>
                                        </div>
                                        <div class="title">{{ __('Layanan Yang Efektif') }}</div>
                                    </div>
                                    <div class="c-text">
                                        {{ __('Berkembang Lebih Cepat Dari Yang Anda Bayangkan.') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- .item -->
                        <div class="col">
                            <div class="card card-border card-hobo card-3" data-aos="fade-up" data-aos-delay="300">
                                <div class="card-body">
                                    <div class="c-head">
                                        <div>
                                            <i class="ri-store-2-line icon"></i>
                                        </div>
                                        <div class="title">{{ __('Menjadi Reseller') }}</div>
                                    </div>
                                    <div class="c-text">
                                        {{ __('Anda Dapat Menjual Kembali Layanan Yang Kami Sediakan.') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- .item -->
                    </div>
                </div>
            </section>

            <section class="home-section">
                <div class="container">
                    <!-- content -->
                    <div class="tci-card">
                        <div class="row">
                            <div class="col-lg-6">
                                <h3 class="tci-title">
                                    {{ __('Kami Peduli Tentang') }}<br /> {{ __('Kepuasan Pelanggan') }}
                                </h3>
                                <a href="{{ url('register') }}" class="btn">
                                    <span>{{ __('Daftar Sekarang!') }}</span>
                                    <i class="ri-arrow-right-line ms-3"></i>
                                </a>
                            </div>
                        </div>
                        <img src="{{ asset('asset-landing/cdn.smmspot.net/cloutsy/assets/img/home/person.png') }}" class="tci-image" alt="">
                    </div>
                </div>
            </section>


            @endsection
