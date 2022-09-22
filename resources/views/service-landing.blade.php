@extends('layouts.auth')
@section('content')
  <div id="PageTitle">{{ __('Layanan') }}</div>
  <div class="container-fluid  mt-5 ">
    <section class="dashboard-head-wrapper">
      <div class="dashboard-head card-border">
        <img src="{{ asset('asset-landing/cdn.mypanel.link/fsvxaw/jy4zpe9929sfe0cm.png')}}" class="mascot-img"/>
        <div class="dhead-body">
          <h2 class="title">
            {{ __('List Layanan colecall-media.id.') }}
          </h2>
          <p class="text">
            <a href="#">{{ __('Beritahu Kami') }}</a>
            {{ __('Jika Layanan Kami Terlalu Mahal / Ingin Custom Layanan.') }}
          </p>
        </div>
      </div>
    </section>
    <section class="mb-4">
    <form method="GET">
      <div class="card card-border">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-md-4 col-12 col-lg-3">
              <select id="type" name="search" class="form-select">
                <option value="all">{{ __('Filter: All') }}</option>
                @forelse ($category as $item )
                <option value="{{ $item->name }}">{{ $item->name }}</option>
                @empty
                <option value="all">Tidak Ada</option>
                @endforelse
                </select>
            </div>
            <div class="col-md-3">
                <div class="input-group-append">
                    <button class="btn btn-primary btn-sm"><i data-feather='search'></i></button>
                </div>
            </div>
            <div class="col-lg">
              <div class="search-services">
                <div class="icon">
                  <i class="ri-search-line"></i>
                </div>
                <input type="text" class="textbox" name="query" id="filterServicesInput" placeholder="{{ __('Cari Layanan') }}" data-search-service="#service-table">
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
    </section>
    <div class="nothing-found" style="display: none;">
      <div class="card card-border">
        <div class="card-body p-4 p-lg-5 text-center">
          <div style="font-size: 64px">
            <i class="ri-search-eye-line w-color"></i>
          </div>
          <h3>Nothing found</h3>
          <p>We searched everywhere but couldn't find anything. Try with different keywords.</p>
          <div class="text-center d-none">
            <a href="index.html" class="btn btn-seconday">Create request for
              <span id="search-text-write"></span>
            </a>
          </div>
        </div>
      </div>
    </div>
    <section class="sp-services">
        @foreach ($category as $item )
        <div class="card card-border category-card" data-category="4708">
          <div class="card-header d-none d-lg-block">
            <div class="s-title-wrapper">
              <div class="s-row s-title">
                <div class="s-col s-col-sm">
                  ID
                </div>
                <div class="s-col s-title">
                  {{ __('Service') }}
                </div>
                <div class="s-col s-col-md">
                  Per 1000
                </div>
                <div class="s-col s-col-md">
                  {{ __('Min Order') }}
                </div>
                <div class="s-col s-col-md">
                  {{ __('Max Order') }}
                </div>
                <div class="s-col s-col-md">
                  {{ __('Detail') }}
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <h2 class="sp-service-title">
                {{ $item->name }}
            </h2>
            @forelse ($item->service()->get() as $service)
            <div class="services-wrapper">
                <div class="si-wrapper" data-filter-table-service-id="1869">
                    <div class="service-item">
                        <div class="s-row">
                            <div class="s-col s-col-sm s-col-id">
                                <span class="sp-serv-sm">{{ $service->id }}</span>
                            </div>
                            <div class="s-col s-title">
                                <span class="sp-serv-title">
                                {{ $service->name }}
                                </span>
                            </div>
                            <div class="s-col s-col-md s-col-c" data-title="Per 1000">
                                <span class="sp-serv-sm">
                                {{ $service->price }}
                                                        </span>
                            </div>
                            <div class="s-col s-col-md s-col-c" data-title="Min">
                                <span class="orlc min">{{ $service->min }}</span>
                            </div>
                            <div class="s-col s-col-md s-col-c" data-title="Max">
                                <span class="orlc max">{{ $service->max }}</span>
                            </div>
                            <div class="s-col s-col-md s-col-btn">
                            <button type="button" class="btn btn-info btn-border btn-block btn-sm" data-toggle="modal" data-target="#default{{ $service->id }}">{{ __('Lihat') }}</button>
                            <div class="modal fade text-left" id="default{{ $service->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="sp-modal-card">
                                        <div class="sp-modal-header">
                                            <div class="sp-modal-service-id">ID-{{ $service->id }}</div>
                                            <h3 class="sp-modal-title">{{ $service->name }}</h3>
                                        </div>
                                        <div class="sp-modal-body">
                                            <div class="sp-modal-body-card">
                                                {!! nl2br(htmlentities($service->note)) !!}
                                            </div>
                                            <a class="btn btn-primary btn-border btn-block">{{ __('Close') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            @empty
            Belum Ada Service
            @endforelse
          </div>
        </div>
        @endforeach
        </div>
    </section>
</div>
@endsection
