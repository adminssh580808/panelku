@extends('layouts.auth')
@section('content')
		<div class="container">
			<section class="bi-head-wrapper">
			<div class="bi-head-box">
				<div class="bi-head-bg">
					<img src="{{ asset('asset-landing/i.ibb.co/N7x01CY/ezgif-com-gif-maker-1.jpg') }}" alt="">
				</div>
				<div class="bi-head-content">
					<div class="bi-title">
						<h1>{{ __('Halaman Masuk') }}</h1>
					</div>
				</div>
			</div>
			</section>
			<section class="blog-content">
			<div class="card card-border">
				<div class="card-body p-4">

					<div class="bi-content">
						<form method="post" action="#">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label for="email mb-2" class="form-label" novalidate="">
                                        <div class="d-flex align-items-center">
                                            <div class="d-icon i-info me-2">
                                                <i class="ri-vip-crown-2-line"></i>
                                            </div>
                                            <span class="i-color fw-600">E-Mail</span>
                                        </div>
                                        </label>
                                        <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" required autofocus>
                                        @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label for="password mb-2" class="form-label">
                                        <div class="d-flex align-items-center">
                                            <div class="d-icon i-warning me-2">
                                                <i class="ri-vip-crown-2-line"></i>
                                            </div>
                                            <span class="w-color fw-600">{{ __('Password') }}</span>
                                        </div>
                                        </label>
                                        <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" name="password" required>
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

							<!-- <div class="g-recaptcha form-group" data-sitekey="6LeF5rUaAAAAADYvG5QRSND25xaKUr_ba9EQ7PbY"></div> -->
							<button type="submit" class="btn btn-primary btn-border">{{ __('Login') }}</button>
							{{-- <input type="hidden" name="_csrf" value="dj0a_guIEBDBoKiXxcdq8rsl0NYCeDhjymvvLDWUFCUwdXDHTfpyPZTozaToky-8_3SF500pYDGYKrpuTdhEbQ=="> --}}
                        </form>
					</div>
				</div>
			</div>
			</section>
			<section class="bi-about-cloutsy">
			<div class="card card-border">
				<div class="card-body p-4">
					<div class="row align-items-center">
						<div class="col-auto d-none d-lg-block">
							<div class="bi-about-avatar">
								<img src="{{ asset('asset-landing/cdn.smmspot.net/cloutsy/assets/img/avatar.png')}}" alt="Avatar">
							</div>
						</div>
						<div class="col-lg">
							<h3 class="bia-title">{{ __('Tentang') }} <span class="p-color">Colecall Media</span></h3>
							<p class="bia-text">
                                {{ __('colecall-media.id Menyediakan Ratusan Layanan Kebutuhan Social Media Anda Untuk Dapat Meningkatkan Followers, Likes, Views, Subscriber, Dan Lainnya Dengan Layanan Berkualitas.') }}
							</p>
						</div>
						<div class="col-lg-auto mt-3 mt-lg-0">
							<a href="{{ url('register') }}" class="btn btn-primary btn-border d-flex align-items-center">
							<span>{{ __('Sign Up & Get Raise!') }}</span>
							<i class="ri-arrow-right-line ms-3"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
			</section>
		</div>
	@endsection
