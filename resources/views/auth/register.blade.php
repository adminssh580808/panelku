@extends('layouts.auth')
@section('content')
		<div class="container">
			<section class="bi-head-wrapper">
			<div class="bi-head-box">
				<div class="bi-head-bg">
					<img src="{{ asset('asset-landing/i.ibb.co/N7x01CY/ezgif-com-gif-maker-1.jpg')}}" alt="">
				</div>
				<div class="bi-head-content">
					<div class="bi-title">
						<h1>{{ __('Daftar') }}</h1>
					</div>
				</div>
			</div>
			</section>
			<section class="blog-content">
			<div class="card card-border">
				<div class="card-body p-4">

					<div class="bi-content">
						<form method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label for="first_name mb-2" class="form-label">
                                        <div class="d-flex align-items-center">
                                            <div class="d-icon i-info me-2">
                                                <i class="ri-vip-crown-2-line"></i>
                                            </div>
                                            <span class="i-color fw-600">{{ __('Nama Depan') }}</span>
                                        </div>
                                        </label>
                                        <input type="text" class="form-control {{ $errors->has('first_name') ? ' is-invalid' : '' }}" id="first_name" name="first_name" autofocus placeholder="{{ __('Nama Depan') }}">
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label for="last_name mb-2" class="form-label">
                                        <div class="d-flex align-items-center">
                                            <div class="d-icon i-info me-2">
                                                <i class="ri-vip-crown-2-line"></i>
                                            </div>
                                            <span class="i-color fw-600">{{ __('Nama Belakang') }}</span>
                                        </div>
                                        </label>
                                        <input type="text" class="form-control {{ $errors->has('last_name') ? ' is-invalid' : '' }}" id="last_name" name="last_name" autofocus placeholder="{{ __('Nama Belakang') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label for="username mb-2" class="form-label">
                                        <div class="d-flex align-items-center">
                                            <div class="d-icon i-info me-2">
                                                <i class="ri-vip-crown-2-line"></i>
                                            </div>
                                            <span class="i-color fw-600">{{ __('Username') }}</span>
                                        </div>
                                        </label>
                                        <input type="text" class="form-control {{ $errors->has('username') ? ' is-invalid' : '' }}" id="username" name="username" autofocus placeholder="Username">
                                        @if ($errors->has('username'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('username') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label for="mb-2" class="form-label">
                                            <div class="d-flex align-items-center">
                                                <div class="d-icon i-primary me-2">
                                                    <i class="ri-vip-crown-2-line"></i>
                                                </div>
                                                <span class="p-color fw-600">{{ __('Bahasa / Mata Uang') }}</span>
                                            </div>
                                        </label>
                                        <select class="form-select" id="bahasa" name="bahasa" style="display: none;">
                                            <option value="id">Indonesia (Rp)</option>
                                            <option value="en">English ($)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label for="email mb-2" class="form-label">
                                        <div class="d-flex align-items-center">
                                            <div class="d-icon i-info me-2">
                                                <i class="ri-vip-crown-2-line"></i>
                                            </div>
                                            <span class="i-color fw-600">Email</span>
                                        </div>
                                        </label>
                                        <input type="text" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" placeholder="Email">
                                        @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label for="phone mb-2" class="form-label">
                                        <div class="d-flex align-items-center">
                                            <div class="d-icon i-info me-2">
                                                <i class="ri-vip-crown-2-line"></i>
                                            </div>
                                            <span class="i-color fw-600">{{ __('No Whatsapp') }}</span>
                                        </div>
                                        </label>
                                        <input type="text" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" id="phone" name="phone" autofocus placeholder="08xxxx">
                                        @if ($errors->has('phone'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label for="password mb-2" class="form-label">
                                        <div class="d-flex align-items-center">
                                            <div class="d-icon i-info me-2">
                                                <i class="ri-vip-crown-2-line"></i>
                                            </div>
                                            <span class="i-color fw-600">{{ __('Password') }}</span>
                                        </div>
                                        </label>
                                        <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" name="password" autofocus placeholder="{{ __('Password') }}">
                                        <div id="pwindicator" class="pwindicator">
                                            <div class="bar"></div>
                                            <div class="label"></div>
                                        </div>
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label for="password2 mb-2" class="form-label">
                                        <div class="d-flex align-items-center">
                                            <div class="d-icon i-info me-2">
                                                <i class="ri-vip-crown-2-line"></i>
                                            </div>
                                            <span class="i-color fw-600">{{ __('Ulangi Kata Sandi') }}</span>
                                        </div>
                                        </label>
                                        <input type="password" class="form-control {{ $errors->has('password2') ? ' is-invalid' : '' }}" id="password2" name="password_confirmation" autofocus placeholder="{{ __('Ulangi Kata Sandi') }}">
                                    </div>
                                </div>
                            </div>

							<!-- <div class="g-recaptcha form-group" data-sitekey="6LeF5rUaAAAAADYvG5QRSND25xaKUr_ba9EQ7PbY"></div> -->
							<button type="submit" class="btn btn-primary btn-border">{{ __('Register') }}</button>
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
