@extends(Auth::user()->level == "Admin"?'layouts.horizontal':'layouts.developer-layouts')
@section('content')
<div class="container-fluid">
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h4 class="page-title m-0"> Kelola Deposit</h4>
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
                  <div class="card-body">
                      <h4 class='header-title mt-0 mb-1'><span><i class=" ti-wallet "></i> Semua Deposit</span></h4>
                     @if(session('success'))

                        <div class="alert alert-success" role="alert">
                            <i class="fa fa-check-circle"></i> {!! session('success') !!}
                        </div>

                    @endif
                    <div class="float-left">
                          <form method="GET">
                            <div class="input-group">
                              <input type="text" class="form-control" placeholder="Cari ID deposit" name="search">
                              <div class="input-group-append">
                                <button class="btn btn-primary"><i data-feather="search"></i></button>
                              </div>
                            </div>
                          </form>
                        </div>
                        <div class="clearfix mb-3"></div>
                    <div class="table-responsive">
                      <table class="table table-striped table-md">
                          <tr>
                            <th>#</th>
                            <th>Tanggal</th>
                            <th>Pengguna - Mata Uang</th>
                            <th>Type</th>
                            <th>Jumlah</th>
                            <th>Pengirim</th>
                            <th>Get saldo</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                          @foreach($deposits as $data)
                          <tr>
                            <td>{{ $data->id }}</td>
                            <td>{{$data->created_at}}</td>
                            <td>{{$data->user->name}} - @if($data->user->bahasa == "id") Rp @else $ @endif </td>
                            <td>{{$data->methods->name}}</td>
                            <td>{{ config('web_config')['CURRENCY_CODE'] }} {{Numberize::make($data->quantity)}}</td>
                            <td>{{$data->sender}}</td>
                            <td>{{ config('web_config')['CURRENCY_CODE'] }} {{Numberize::make($data->get_balance)}}</td>
                            <td><span class="badge badge-{{ ($data->status=='Success' ? 'success' : ($data->status == 'Pending' ? 'warning' : 'danger')) }}">{{$data->status}}</span></td>
                            <td style="display: inline-flex;">
                              @if($data->status == "Pending")
                              <form method="POST" class="form-delete" action="{{ url( (Auth::user()->level == 'Developer') ? 'developer/deposit/accept' : 'staff/deposit/accept') }}">
                                @csrf
                                <input type="hidden" value="{{ $data->id }}" name="id">
                                <button type="submit" class="btn btn-info mr-1"  data-delete='{{ $data->id }}' name="accept">
                                  <i data-feather="check"></i>
                                </button>
                              </form>
                              <form method="POST" class="form-delete" action="{{ (Auth::user()->level == 'Developer') ? url('developer/deposit/decline') : url('staff/deposit/decline') }}">
                                @csrf
                                <input type="hidden" value="{{ $data->id }}" name="id">
                                <button type="submit" class="btn btn-danger"  name="reject">
                                  <i data-feather="trash"></i>
                                </button>
                              </form>
                              @else
                              
                              <form method="POST" class="form-delete" action="{{ (Auth::user()->level == 'Developer') ? url('developer/deposit/decline') : url('staff/deposit/decline') }}">
                                @csrf
                                <input type="hidden" value="{{ $data->id }}" name="id">
                                <button type="submit" class="btn btn-danger"  name="reject" disabled>
                                  <i data-feather="trash"></i>
                                </button>
                              </form>
                              @endif
                            </td>
                          </tr>
                          @endforeach
                      </table>
                    </div>
                    {{ $deposits->links() }}
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
</div>
@endsection
