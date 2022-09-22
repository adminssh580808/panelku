@extends('layouts.horizontal-developer')

@section('content')
<div class="container-fluid">
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h4 class="page-title m-0"> Tambah Kategori</h4>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>

          <div class="section-body">

          	<div class="row">
          		<div class="col-md-12">
          			<div class="card">
		                <div class="">
                        </div>
                        <form method="POST" action="">
                        @csrf
                          <div class="card-body">
		                        <h4 class='header-title mt-0'><span>Tambah Top User Order</span></h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama User 1</label>
                                        <select class="form-control" name="name1">
                                          <option value="">Choose one..</option>
                                          @foreach ($users as $item )
                                          <option value="{{ $item->name }}">{{ $item->name }}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Total Pesanan 1</label>
                                        <input type="text" placeholder="Rp 100.000" class="form-control" name="total1">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama User 2</label>
                                        <select class="form-control" name="name2">
                                          <option value="">Choose one..</option>
                                          @foreach ($users as $item )
                                          <option value="{{ $item->name }}">{{ $item->name }}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Total Pesanan 2</label>
                                        <input type="text" placeholder="Rp 100.000" class="form-control" name="total2">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama User 3</label>
                                        <select class="form-control" name="name3">
                                          <option value="">Choose one..</option>
                                          @foreach ($users as $item )
                                          <option value="{{ $item->name }}">{{ $item->name }}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Total Pesanan 3</label>
                                        <input type="text" placeholder="Rp 100.000" class="form-control" name="total3">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama User 4</label>
                                        <select class="form-control" name="name4">
                                          <option value="">Choose one..</option>
                                          @foreach ($users as $item )
                                          <option value="{{ $item->name }}">{{ $item->name }}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Total Pesanan 4</label>
                                        <input type="text" placeholder="Rp 100.000" class="form-control" name="total4">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama User 5</label>
                                        <select class="form-control" name="name5">
                                          <option value="">Choose one..</option>
                                          @foreach ($users as $item )
                                          <option value="{{ $item->name }}">{{ $item->name }}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Total Pesanan 5</label>
                                        <input type="text" placeholder="Rp 100.000" class="form-control" name="total5">
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
