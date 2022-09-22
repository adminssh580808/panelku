@extends('layouts.user-layouts')

@section('content')
<div class="container-fluid">
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box mb-1">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h4 class="page-title m-0">{{ __('Deposit') }}</h4>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <hr>

          <div class="section-body">
          	<div class="row" style="justify-content: center;">

                <!-- Tabs with Icon starts -->
                <div class="col-xl-8 col-lg-12">
                    <div class="card">
                            <ul class="nav nav-tabs justify-content-center mt-1" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="homeIcon-tab" data-toggle="tab" href="#homeIcon" aria-controls="home" role="tab" aria-selected="true"><i data-feather='credit-card'></i> {{ __('Deposit') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profileIcon-tab" data-toggle="tab" href="#profileIcon" aria-controls="profile" role="tab" aria-selected="false"><i data-feather='book'></i> {{ __('Riwayat') }}</a>
                                </li>
                            </ul>
                            <hr>
                            <div class="tab-content">
                                <div class="tab-pane active" id="homeIcon" aria-labelledby="homeIcon-tab" role="tabpanel">
                                    <div class="row" style="text-align-last: center;">
                                        <div class="col-12">
                                            <div class="basic-modal">
                                                <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#default">
                                                    {{ __('Cara Deposit') }}
                                                </button>
                                                <button type="button" class="btn btn-outline-primary btn-sm ml-1" data-toggle="modal" data-target="#hubungi">
                                                    {{ __('Hubungi Kami') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body mt-0">
                                      <form method="POST" action="">
                                          @csrf
                                            @if(session('success'))
                                            <div class="alert alert-success" role="alert">
                                                <h4 class="alert-heading">Success</h4>
                                                <div class="alert-body">
                                                    {!! session('success') !!}
                                                </div>
                                            </div>
                                              @elseif(session('danger'))
                                                <div class="alert alert-danger" role="alert">
                                                    <h4 class="alert-heading">Gagal</h4>
                                                    <div class="alert-body">
                                                        {!! session('danger') !!}
                                                    </div>
                                                </div>
                                            @endif

                                              @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{!! $error !!}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif

                                            <div class="form-group">
                                              <label>{{ __('Mata Uang') }}</label>
                                              <select class="form-control select2" id="type" name="type">
                                                <option value="" selected>{{ __('Pilih tipe') }}</option>
                                                <option value="Manual">{{ __('International') }}</option>
                                                <option value="Otomatis">{{ __('Indonesia') }}</option>
                                              </select>
                                            </div>
                                            <div class="form-group">
                                              <label>{{ __('Metode Deposit') }}</label>
                                              <select class="form-control select2" id="method" name="method">
                                                <option value="">{{ __('Pilih tipe terlebih dahulu..') }}</option>
                                              </select>
                                            </div>
                                            <div class="form-group" hidden>
                                              <label>{{ __('Pengirim') }}</label>
                                              <input type="text" class="form-control" name="sender" value="Member Colecall Media" placeholder="Isi nomor/rekening pengirim (contoh: 08123456)">
                                            </div>
                                            <input type="hidden" name="price" id="price">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label>{{ __('Jumlah') }}</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    {{ auth()->user()->bahasa == "en" ? "$" : "Rp." }}
                                                                </div>
                                                            </div>
                                                            <input type="number" class="form-control" name="quantity" id="quantity_deposit">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label>{{ __('Get balance') }}</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    {{ auth()->user()->bahasa == "en" ? "$" : "Rp." }}
                                                                </div>
                                                            </div>
                                                            <input type="number" class="form-control" id="get_balance" readonly>
                                                        </div>
                                                      </div>
                                                </div>

                                            </div>
                                            <div class="form-group mt-1">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>

                                      </form>
                                    </div>
                                </div>
                                <div class="tab-pane" id="profileIcon" aria-labelledby="profileIcon-tab" role="tabpanel">
                                    <div class="row mb-1" style="text-align-last: center;">
                                        <div class="col-12">
                                            <div class="basic-modal">
                                                <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#default">
                                                    {{ __('Cara Deposit') }}
                                                </button>
                                                <button type="button" class="btn btn-outline-primary btn-sm ml-1" data-toggle="modal" data-target="#hubungi">
                                                    {{ __('Hubungi Kami') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-md">
                                            <tr>
                                                <th>ID</th>
                                                <th>{{ __('Tanggal') }}</th>
                                                <th>{{ __('Type') }}</th>
                                                <th>{{ __('Jumlah') }}</th>
                                                <th>{{ __('Pengirim') }}</th>
                                                <th>Status</th>
                                                {{-- <th>{{ __('Action') }}</th> --}}
                                            </tr>
                                              @foreach($deposit as $data)
                                            <tr>
                                                <td>{{ $data->id }}</td>
                                                <td>{{$data->created_at}}</td>
                                                <td>{{$data->methods->name}} ({{$data->methods->type}})</td>
                                                <td>{{ config('web_config')['CURRENCY_CODE'] }} {{Numberize::make($data->quantity)}}</td>
                                                <td>{{$data->sender}}</td>
                                                <td><span class="badge badge-{{ ($data->status=='Success' ? 'success' : ($data->status == 'Pending' ? 'warning' : 'danger')) }}">{{$data->status}}</span>
                                                {{-- <td>
                                                  @if($data->methods->type == 'MANUAL')
                                                    <a href="{{ url('contact') }}" class="btn btn-info">Konfirmasi</a>
                                                  @else
                                                    <button class="btn btn-secondary" disabled data-toggle="tooltip" data-placement="bottom" title="Fitur konfirmasi hanya untuk deposit manual">Konfirmasi</button>
                                                  @endif
                                                  @if(!$data->status == 'Canceled' || !$data->status == 'Success')
                                                  <form method="POST" class="form-delete">
                                                    @csrf
                                                    @method('delete')
                                                    <input type="hidden" value="{{ $data->id }}" name="id">
                                                    <button type="submit" class="btn btn-danger" id="cancel_deposit" data-delete='{{ $data->id }}'>Cancel</button>
                                                  </form>
                                                  @endif
                                                </td> --}}
                                            </tr>
                                              @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel1">{{ __('Cara Deposit') }}</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="homeIcon-tab" data-toggle="tab" href="#homeIcon" aria-controls="home" role="tab" aria-selected="true"><i data-feather='alert-circle'></i> {{ __('Deposit') }}</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="homeIcon" aria-labelledby="homeIcon-tab" role="tabpanel">
                                        <p>

                                                @if (Auth::user()->bahasa == "id")
                                            <ol>
                                                <li>Pilih Mata Uang terlebih dahulu</li>
                                                <li>Pilih metode yang ingin kamu gunakan</li>
                                                <li>Masukkan jumlah deposit</li>
                                                <li>Tekan tombol submit maka lakukanlah pembayaran sesuai yang diinstruksikan setelahnya</li>
                                            </ol>
                                                <p>NOTES ! <br>
                                                    Seluruh Aktivitas Penipuan Seperti Menggunakan Kartu Kredit Yang Tidak Sah / Dicuri & Money Loundry Akan Menyebabkan Penghentian Akun Anda (TIDAK ADA PENGECUALIAN)</p>
                                                @else
                                            <ol>
                                                <li>Select Type first (Manual/Auto)</li>
                                                <li>Select the method you want to use</li>
                                                <li>Enter deposit amount</li>
                                                <li>Press the submit button then make the payment as instructed after</li><br>
                                                <p>NOTES ! <br>
                                                All Fraudulent Activities Like Using Unauthorized/Stolen Credit Cards & Money Loundry Will Cause Termination of Your Account (NO EXCEPTIONS)</p>
                                            </ol>
                                                @endif

                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">{{ __('Mengerti') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Contact Us -->
                <div class="modal fade text-left" id="hubungi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel1">{{ __('Hubungi Kami') }}</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="homeIcon-tab" data-toggle="tab" href="#homeIcon" aria-controls="home" role="tab" aria-selected="true"><i data-feather='alert-circle'></i> {{ __('Deposit') }}</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="homeIcon" aria-labelledby="homeIcon-tab" role="tabpanel">
                                        <p>
                                            <ol>
                                                <li>Whatsapp : 082261011484</li>
                                                <li>Telegram : @OwnColecallMedia</li>
                                            </ol>
                                        </p>
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
        </section>




</div>
@endsection
@push('scripts')
	<script type="text/javascript" src="{{ asset('js/deposit.js') }}"></script>
@endpush
