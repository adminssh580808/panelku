@extends('layouts.horizontal-developer')

@section('content')
<div class="container-fluid">
<div class="row">
    <div class="col-12 text-center">
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <h4 class="page-title m-0">Kelola TOP 5 User</h4>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
        <div class="card-body">
            <h4 class='header-title mt-0'><span><i class="dripicons-user"></i> Kelola TOP 5 User (PESANAN)</span></h4>
            {{-- @if(session('success'))

            <div class="alert alert-success" role="alert">
                <i class="fa fa-check-circle"></i> {{ session('success') }}
            </div>

            @endif --}}
            <div class="float-left">
                <form method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari email atau nama" name="search">
                    <div class="input-group-append">
                    <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                    </div>
                </div>
                </form>
            </div>
            <div class=" float-right">
                <a href="{{ url('developer/users/add') }}" class="btn btn-primary">Tambah</a>
            </div>
        <div class="clearfix mb-3"></div>
                <div class="table-responsive">
                    <table class="table table-striped table-md">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Total Order</th>
                    </tr>
                    @foreach($top_order as $item)
                    <tr>
                        <td>1</td>
                        <td>{{ $item->name1 }}</td>
                        <td>{{ config('web_config')['CURRENCY_CODE'] }} {{ Numberize::make($item->total1) }}</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>{{ $item->name2 }}</td>
                        <td>{{ config('web_config')['CURRENCY_CODE'] }} {{ Numberize::make($item->total2) }}</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>{{ $item->name3 }}</td>
                        <td>{{ config('web_config')['CURRENCY_CODE'] }} {{ Numberize::make($item->total3) }}</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>{{ $item->name4 }}</td>
                        <td>{{ config('web_config')['CURRENCY_CODE'] }} {{ Numberize::make($item->total4) }}</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>{{ $item->name5 }}</td>
                        <td>{{ config('web_config')['CURRENCY_CODE'] }} {{ Numberize::make($item->total5) }}</td>
                    </tr>
                    @endforeach
                </table>
                </div>
                {{-- {{$users->links()}} --}}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
        <div class="card-body">
            <h4 class='header-title mt-0'><span><i class="dripicons-user"></i> Kelola TOP 5 User (Deposit)</span></h4>
            {{-- @if(session('success'))

            <div class="alert alert-success" role="alert">
                <i class="fa fa-check-circle"></i> {{ session('success') }}
            </div>

            @endif --}}
            <div class="float-left">
                <form method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari email atau nama" name="search">
                    <div class="input-group-append">
                    <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                    </div>
                </div>
                </form>
            </div>
            <div class=" float-right">
                <a href="{{ url('developer/users/add') }}" class="btn btn-primary">Tambah</a>
            </div>
        <div class="clearfix mb-3"></div>
                <div class="table-responsive">
                    <table class="table table-striped table-md">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Total Order</th>
                    </tr>
                    @foreach($top_deposit as $item)
                    <tr>
                        <td>1</td>
                        <td>{{ $item->name1 }}</td>
                        <td>{{ config('web_config')['CURRENCY_CODE'] }} {{ Numberize::make($item->total1) }}</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>{{ $item->name2 }}</td>
                        <td>{{ config('web_config')['CURRENCY_CODE'] }} {{ Numberize::make($item->total2) }}</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>{{ $item->name3 }}</td>
                        <td>{{ config('web_config')['CURRENCY_CODE'] }} {{ Numberize::make($item->total3) }}</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>{{ $item->name4 }}</td>
                        <td>{{ config('web_config')['CURRENCY_CODE'] }} {{ Numberize::make($item->total4) }}</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>{{ $item->name5 }}</td>
                        <td>{{ config('web_config')['CURRENCY_CODE'] }} {{ Numberize::make($item->total5) }}</td>
                    </tr>
                    @endforeach
                </table>
                </div>
                {{-- {{$users->links()}} --}}
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
        <div class="card-body">
            <h4 class='header-title mt-0'><span><i class="dripicons-user"></i> Kelola TOP 5 User (GIVEAWAY)</span></h4>
            {{-- @if(session('success'))

            <div class="alert alert-success" role="alert">
                <i class="fa fa-check-circle"></i> {{ session('success') }}
            </div>

            @endif --}}
            <div class="float-left">
                <form method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari email atau nama" name="search">
                    <div class="input-group-append">
                    <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                    </div>
                </div>
                </form>
            </div>
            <div class=" float-right">
                <a href="{{ url('developer/users/add') }}" class="btn btn-primary">Tambah</a>
            </div>
        <div class="clearfix mb-3"></div>
                <div class="table-responsive">
                    <table class="table table-striped table-md">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Code</th>
                        <th>Total Giveaway</th>
                    </tr>
                    @foreach($top_giveaway as $item)
                    <tr>
                        <td>1</td>
                        <td>{{ $item->name1 }}</td>
                        <td>{{ $item->code1 }}</td>
                        <td>{{ config('web_config')['CURRENCY_CODE'] }} {{ Numberize::make($item->total1) }}</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>{{ $item->name2 }}</td>
                        <td>{{ $item->code2 }}</td>
                        <td>{{ config('web_config')['CURRENCY_CODE'] }} {{ Numberize::make($item->total2) }}</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>{{ $item->name3 }}</td>
                        <td>{{ $item->code3 }}</td>
                        <td>{{ config('web_config')['CURRENCY_CODE'] }} {{ Numberize::make($item->total3) }}</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>{{ $item->name4 }}</td>
                        <td>{{ $item->code4 }}</td>
                        <td>{{ config('web_config')['CURRENCY_CODE'] }} {{ Numberize::make($item->total4) }}</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>{{ $item->name5 }}</td>
                        <td>{{ $item->code5 }}</td>
                        <td>{{ config('web_config')['CURRENCY_CODE'] }} {{ Numberize::make($item->total5) }}</td>
                    </tr>
                    @endforeach
                </table>
                </div>
                {{-- {{$users->links()}} --}}
            </div>
        </div>
    </div>
</div>
</div>
@endsection
