@extends('layouts.user-layouts')

@section('content')
<div class="container-fluid">
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
          <div class="row align-items-center">
              <div class="col-md-8">
                  <h4 class="page-title m-0">Informasi Profile</h4>
              </div>
              <!-- end col -->
          </div>
          <!-- end row -->
      </div>
      <hr>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="card card-congratulations">
            <div class="card-body text-center">
                <img src="{{asset('app-assets/images/elements/decore-left.png')}}" class="congratulations-img-left" alt="card-img-left">
                <img src="{{asset('app-assets/images/elements/decore-right.png')}}" class="congratulations-img-right" alt="card-img-right">
                <div class="avatar avatar-xl bg-primary shadow">
                    <div class="avatar-content">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-award font-large-1"><circle cx="12" cy="8" r="7"></circle><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline></svg>
                    </div>
                </div>
                <div class="text-center">
                    <h1 class="mb-1 text-white">Selamat Datang {{ Auth::user()->name }},</h1>
                    <p class="card-text m-auto w-75">
                        You have done <strong>57.6%</strong>.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-md-6 col-12">
        <div class="row">
            <div class="col-xl-6 col-md-6">
                <div class="card bg-primary mini-stat text-white">
                    <div class="p-1 mini-stat-desc">
                        <div class="clearfix">
                            <h6 class="text-uppercase mt-0 float-left text-white-50">Saldo</h6>
                            <h4 class="mb-1 mt-0 text-white float-right"> {{ convert(Numberize::make(Auth::user()->balance)) }}</h4>
                        </div>
                        <div>
                            <a href="http://127.0.0.1:8000/balance_usage" class=" btn btn-outline-light btn-sm">Isi Saldo</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-6">
                <div class="card bg-success mini-stat text-white">
                    <div class="p-1 mini-stat-desc">
                        <div class="clearfix">
                            <h6 class="text-uppercase mt-0 float-left text-white-50">Order Dalam Proses</h6>
                            <h4 class="mb-1 mt-0 float-right">{{$pendingprocessing}}</h4>
                        </div>
                        <div>
                            <a href="http://127.0.0.1:8000/balance_usage" class=" btn btn-outline-light btn-sm">Riwayat Order</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-6">
                <div class="card bg-primary mini-stat text-white">
                    <div class="p-1 mini-stat-desc">
                        <div class="clearfix">
                            <h6 class="text-uppercase mt-0 float-left text-white-50">Penggunaan</h6>
                            <h4 class="mb-1 mt-0 text-white float-right">Rp {{Numberize::make($used_balance)}}</h4>
                        </div>
                        <div>
                            <span class="badge badge-light text-primary"> {{Numberize::make($balance_percentage,2)}}% </span> <span class="ml-2">Dari bulan lalu</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-6">
                <div class="card bg-primary mini-stat text-white">
                    <div class="p-1 mini-stat-desc">
                        <div class="clearfix">
                            <h6 class="text-uppercase mt-0 float-left text-white-50">Order bulan ini</h6>
                            <h4 class="mb-1 mt-0 float-right">{{$total_order_thismo}}</h4>
                        </div>
                        <div>
                            <span class="badge badge-light text-primary"> +{{$order_percentage}}% </span> <span class="ml-2">Dari Bulan Kemarin</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 mb-3">
        <div class="row">
            <div class="col-12 mb-1">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list user-timeline-title-icon"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg>
                            <h4 class="card-title ml-1">Information</h4>
                        </div>
                    </div>
                    <div class="card-body overflow-auto" style="max-height: 440px;">
                            <ul class="timeline ml-50">
                                @foreach($news as $data)
                                <li class="timeline-item">
                                    <span class="timeline-point timeline-point-indicator"></span>
                                    <div class="timeline-event">
                                        <div class="clearfix">
                                            <h6 class="float-left">{{ $data->title }}</h6>
                                            <h6 class="float-right">{{ date('d F Y H:i', strtotime($data->created_at)) }}</h6>
                                        </div>
                                        <p>{!! nl2br(htmlentities($data->content)) !!}</p>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
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
