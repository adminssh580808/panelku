@extends('layouts.horizontal-developer')

@section('content')
<div class="container-fluid">
<div class="row">
    <div class="col-sm-12">

          <div class="section-body">

          	<div class="row">
          		<div class="col-md-12 mt-3">
          			<div class="card">
		                <div class="">
                        </div>
                        <form method="POST" action="">
                        @csrf
                          <div class="card-body">
		                        <h4 class='header-title mt-0'><span>Edit Top Giveaway</span></h4>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Nama User 1</label>
                                        <select class="form-control" name="name1">
                                          <option value="{{ $top->name1 }}" selected>{{ $top->name1 }}</option>
                                          @foreach ($users as $item )
                                          <option value="{{ $item->name }}">{{ $item->name }}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Code Voucher 1</label>
                                        <input type="text" placeholder="Masukan Code Voucher" class="form-control" name="code1" value="{{ $top->code1 }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Total Pesanan 1</label>
                                        <input type="text" placeholder="Rp 100.000" class="form-control" name="total1" value="{{ $top->total1 }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Nama User 2</label>
                                        <select class="form-control" name="name2">
                                          <option value="">Choose one..</option>
                                          <option value="{{ $top->name2 }}" selected>{{ $top->name2 }}</option>
                                          @foreach ($users as $item )
                                          <option value="{{ $item->name }}">{{ $item->name }}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Code Voucher 2</label>
                                        <input type="text" placeholder="Masukan Code Voucher" class="form-control" name="code2" value="{{ $top->code2 }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Total Pesanan 2</label>
                                        <input type="text" placeholder="Rp 100.000" class="form-control" name="total2" value="{{ $top->total2 }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Nama User 3</label>
                                        <select class="form-control" name="name3">
                                            <option value="{{ $top->name3 }}" selected>{{ $top->name3 }}</option>
                                          @foreach ($users as $item )
                                          <option value="{{ $item->name }}">{{ $item->name }}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Code Voucher 3</label>
                                        <input type="text" placeholder="Masukan Code Voucher" class="form-control" name="code3" value="{{ $top->code3 }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Total Pesanan 3</label>
                                        <input type="text" placeholder="Rp 100.000" class="form-control" name="total3" value="{{ $top->total3 }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Nama User 4</label>
                                        <select class="form-control" name="name4">
                                            <option value="{{ $top->name4 }}" selected>{{ $top->name4 }}</option>
                                          @foreach ($users as $item )
                                          <option value="{{ $item->name }}">{{ $item->name }}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Code Voucher 4</label>
                                        <input type="text" placeholder="Masukan Code Voucher" class="form-control" name="code4" value="{{ $top->code4 }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Total Pesanan 4</label>
                                        <input type="text" placeholder="Rp 100.000" class="form-control" name="total4" value="{{ $top->total4 }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Nama User 5</label>
                                        <select class="form-control" name="name5">
                                            <option value="{{ $top->name5 }}" selected>{{ $top->name5 }}</option>
                                          @foreach ($users as $item )
                                          <option value="{{ $item->name }}">{{ $item->name }}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Code Voucher 5</label>
                                        <input type="text" placeholder="Masukan Code Voucher" class="form-control" name="code5" value="{{ $top->code5 }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Total Pesanan 5</label>
                                        <input type="text" placeholder="Rp 100.000" class="form-control" name="total5" value="{{ $top->total5 }}">
                                    </div>
                                </div>
                            </div>

                          </div>
                          <div class="mr-3 form-group text-right">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                          </div>
                        </form>
		            </div>
          		</div>
          	</div>

          </div>
        </div>
      </div>
</div>
@endsection
