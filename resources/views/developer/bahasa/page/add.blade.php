@extends('layouts.developer-layouts')

@section('content')
<div class="container-fluid">
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h4 class="page-title m-0"> Tambah Category Page</h4>
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
                        <form method="POST" action="">
                            @csrf
                          <div class="card-body">
		                        <h4 class='header-title mt-0'><span>Tambah Category Page</span></h4>
                            {{-- @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif --}}
                              <div class="form-group">
                                <label>Name Page</label>
                                <input type="text" placeholder="Nama kategori.." class="form-control" name="nama">
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
