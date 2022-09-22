@extends(Auth::user()->level == "Admin"?'layouts.horizontal':'layouts.developer-layouts')

@section('content')
<div class="container-fluid">
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h4 class="page-title m-0"><i class="dripicons-user"></i> Kelola Bahasa</h4>
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
                  <div class="card-body">
                    <div class="float-left">
                      <form method="GET">
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Cari ID order atau target" name="search">
                          <div class="input-group-append">
                            <button class="btn btn-primary"><i data-feather="search"></i></button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <div class="clearfix mb-3"></div>
		              	{{-- @if(session('success'))

                        <div class="alert alert-success" role="alert">
                            <i class="fa fa-check-circle"></i> {{ session('success') }}
                        </div>

                    	@endif --}}
                          <div class="table-responsive">
                                <table class="table table-striped table-md">
                                <tr>
                                    <th>No</th>
                                    <th>Page</th>
                                    <th>Action</th>
                                </tr>
                                {{-- @foreach($orders as $order) --}}
                                <tr>
                                    <td>1</td>
                                    <td>Order</td>
                                    <td><button class="btn btn-info">Edit</button></td>
                                    <td>
                                      {{-- @if(Auth::user()->level == 'Admin')
                                        <a href="{{ url('staff/orders/sosmed/edit/'.$order->id)}}" class="btn btn-primary"><i data-feather="edit"></i></a>
                                      @else
                                        <a href="{{ url('developer/orders/sosmed/edit/'.$order->id)}}" class="btn btn-primary"><i data-feather="edit"></i></a>
                                      @endif --}}


                                    </td>
                                </tr>
                                {{-- @endforeach --}}
                            </table>
                          </div>
		              </div>
		            </div>
          		</div>
          	</div>

          </div>
        </div>
      </div>
</div>
@endsection
