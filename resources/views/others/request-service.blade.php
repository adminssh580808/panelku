@extends('layouts.user-layouts')

@section('content')
<div class="container-fluid">
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box mb-1">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h4 class="page-title m-0">Request Service</h4>
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
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="homeIcon" aria-labelledby="homeIcon-tab" role="tabpanel">
                                    <div class="row" style="text-align-last: center;">
                                        <div class="col-12">
                                            <div class="basic-modal">
                                                <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#default">
                                                    Cara Request Service
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body mt-0">
                                      <form method="POST" action="">
                                            <div class="form-group">
                                              <label>Pilih Kategori</label>
                                              <select class="form-control select2" id="type" name="type">
                                                <option value="">Pilih Kategori</option>
                                                <option value="Manual">Manual</option>
                                                <option value="Otomatis">Otomatis</option>
                                              </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Link Panel (Penyedia Layanan)</label>
                                                <input type="text" class="form-control" name="sender" placeholder="Contoh : https://www.colecall-media.id">
                                            </div>
                                            <div class="form-group">
                                                <label>Nama / ID Layanan</label>
                                                <input type="text" class="form-control" name="sender" placeholder="Instagram Followers Bergaransi [Garansi 30 Hari - Fast] / ID-102">
                                            </div>
                                            <div class="form-group mt-1">
                                                <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#default">
                                                    Request
                                                </button>
                                            </div>
                                      </form>
                                    </div>
                                </div>
                                <div class="tab-pane" id="disabledIcon" aria-labelledby="disabledIcon-tab" role="tabpanel">
                                    <p>
                                        Chocolate croissant cupcake croissant jelly donut. Cheesecake toffee apple pie chocolate bar biscuit
                                        tart croissant. Lemon drops danish cookie. Oat cake macaroon icing tart lollipop cookie sweet bear claw.
                                    </p>
                                </div>
                                <div class="tab-pane" id="aboutIcon" aria-labelledby="aboutIcon-tab" role="tabpanel">
                                    <p>
                                        Gingerbread cake cheesecake lollipop topping bonbon chocolate sesame snaps. Dessert macaroon bonbon
                                        carrot cake biscuit. Lollipop lemon drops cake gingerbread liquorice. Sweet gummies dragée. Donut bear
                                        claw pie halvah oat cake cotton candy sweet roll. Cotton candy sweet roll donut ice cream.
                                    </p>
                                    <p>
                                        Halvah bonbon topping halvah ice cream cake candy. Wafer gummi bears chocolate cake topping powder.
                                        Sweet marzipan cheesecake jelly-o powder wafer lemon drops lollipop cotton candy.
                                    </p>
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
                                <h4 class="modal-title" id="myModalLabel1">Request Service</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="homeIcon-tab" data-toggle="tab" href="#homeIcon" aria-controls="home" role="tab" aria-selected="true"><i data-feather='alert-circle'></i> Deposit</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="homeIcon" aria-labelledby="homeIcon-tab" role="tabpanel">
                                        <p>
                                            Kami Akan Segera Mengadakan Fitur Ini.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Mengerti</button>
                            </div>
                        </div>
                    </div>
                </div>
          	</div>

          </div>
        </section>




</div>
@endsection
