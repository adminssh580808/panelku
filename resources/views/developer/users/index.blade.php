@extends('layouts.developer-layouts')

@section('content')
<div class="container-fluid">
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h4 class="page-title m-0">Kelola Pengguna</h4>
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
		              	@if(session('success'))

                        <div class="alert alert-success" role="alert">
                            <i class="fa fa-check-circle"></i> {{ session('success') }}
                        </div>

                    	@endif
                      <div class="float-left">
                          <form method="GET">
                            <div class="input-group">
                              <input type="text" class="form-control" placeholder="Cari email atau nama" name="search">
                              <div class="input-group-append">
                                <button class="btn btn-primary"><i data-feather='search'></i></button>
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
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Saldo</th>
                                    <th>Level</th>
                                    <th>Status</th>
                                    <th>API Key</th>
                                    <th>Action</th>
                                </tr>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ config('web_config')['CURRENCY_CODE'] }} {{ Numberize::make($user->balance) }}</td>
                                    <td>{{ $user->level }}</td>
                                    <td>
                                      <span class="badge badge-{{ ($user->status =='Active' ? 'success' : 'danger') }}">{{ $user->status }}</span>
                                    </td>
                                    <td>{{ $user->api_key }}</td>
                                    <td style="display: inline-flex;">
                                        <a href="{{ url('developer/users/edit/'.$user->id)}}" class="btn btn-primary mr-1"><i data-feather='edit'></i></a>
                                        <form method="POST" class="form-delete">
                                            @method('delete')
                                            @csrf
                                            <input type="hidden" value="{{ $user->id }}" name="id">
                                            <button type="button" class="btn btn-danger">
                                                <i data-feather='trash'></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                          </div>
                          {{$users->links()}}
		              </div>
		            </div>
          		</div>
          	</div>

          </div>
    </div>
  </div>
</div>
@endsection
