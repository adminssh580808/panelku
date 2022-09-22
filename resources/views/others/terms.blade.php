@extends('layouts.user-layouts')

@section('content')
        <div class="content-body">
            <!-- search header -->
            <section id="faq-search-filter">
                <div class="card faq-search">
                    <div class="card-body text-center">
                        <!-- main title -->
                        <h2 class="text-primary">Seputar Pertanyaan Dan Ketentuan</h2>
                    </div>
                </div>
            </section>
            <!-- /search header -->

            <!-- frequently asked questions tabs pills -->
            <section id="faq-tabs">
                <!-- vertical tab pill -->
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="faq-navigation d-flex justify-content-between flex-column mb-2 mb-md-0">
                            <!-- pill tabs navigation -->
                            <ul class="nav nav-pills nav-left flex-column" role="tablist">
                                <!-- payment -->
                                <li class="nav-item">
                                    <a class="nav-link active" id="payment" data-toggle="pill" href="#faq-payment" aria-expanded="true" role="tab">
                                        <i data-feather="credit-card" class="font-medium-3 mr-1"></i>
                                        <span class="font-weight-bold">{{ __('Umum') }}</span>
                                    </a>
                                </li>

                                <!-- delivery -->
                                <li class="nav-item">
                                    <a class="nav-link" id="delivery" data-toggle="pill" href="#faq-delivery" aria-expanded="false" role="tab">
                                        <i data-feather="shopping-bag" class="font-medium-3 mr-1"></i>
                                        <span class="font-weight-bold">{{ __('Layanan') }}</span>
                                    </a>
                                </li>

                                <!-- cancellation and return -->
                                <li class="nav-item">
                                    <a class="nav-link" id="cancellation-return" data-toggle="pill" href="#faq-cancellation-return" aria-expanded="false" role="tab">
                                        <i data-feather="refresh-cw" class="font-medium-3 mr-1"></i>
                                        <span class="font-weight-bold">{{ __('Pembayaran & Pengembalian') }}</span>
                                    </a>
                                </li>
                            </ul>

                            <!-- FAQ image -->
                            <img src="../../../app-assets/images/illustration/faq-illustrations.svg" class="img-fluid d-none d-md-block" alt="demand img" />
                        </div>
                    </div>

                    <div class="col-lg-9 col-md-8 col-sm-12">
                        <!-- pill tabs tab content -->
                        <div class="tab-content">
                            <!-- payment panel -->
                            <div role="tabpanel" class="tab-pane active" id="faq-payment" aria-labelledby="payment" aria-expanded="true">
                                <!-- icon and header -->
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-tag bg-light-primary mr-1">
                                        <i data-feather="credit-card" class="font-medium-4"></i>
                                    </div>
                                    <div>
                                        <h4 class="mb-0">{{ __('Umum') }}</h4>
                                    </div>

                                </div>

                                <!-- frequent answer and question  collapse  -->
                                <div class="collapse-margin collapse-icon mt-2" id="faq-payment-qna">

                                    <!-- App Design Card -->
                                    <div class="col-lg-12 col-md-12 col-12">
                                        <div class="card card-app-design">
                                                <div class="card-body">
                                                    <p></p><h3>{{ __('Umum') }}</h3>
                                                    <ul><br>
                                                    <li>Dengan memesan atau membeli pesanan di Colecall Media ,anda menyutujui semua peraturan yang ada. Tidak perduli anda membacanya atau tidak.</li><br>
                                                    <li>Kami Colecall Media mempunyai hak untuk merubah peraturan yang ada tanpa ada pemberitahuan sebelumnya. Kami harapkan anda untuk membaca ketentuan yang ada sebelum memesan/membeli agar anda tetap up to date dengan perubahan yang ada.</li><br>
                                                    <li>Rate deposit Colecall Media dapat berubah kapanpun tanpa pemberitahuan. Pembayaran akan bergantung dengan rate yang kami sediakan. </li><br>
                                                    <li><b>Disclaimer:</b> Colecall Media tidak akan bertanggung jawab untuk semua kerusakan pada akun anda atau bisnis anda.</li><br>
                                                    <li><b>Liabilities:</b> Colecall Media sama sekali tidak akan bertanggung jawab atas setiap akun suspensi atau penghapusan gambar yang dilakukan oleh Instagram / Twitter / layanan lainnya.</li><br>
                                                    <li><b>Liabilities:</b> Colecall Media sama sekali tidak akan bertanggung jawab Jika Anda Memasukkan Nomor Hp/Data Yang Salah..</li><br>
                                                </ul>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- delivery panel -->
                            <div class="tab-pane" id="faq-delivery" role="tabpanel" aria-labelledby="delivery" aria-expanded="false">
                                <!-- icon and header -->
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-tag bg-light-primary mr-1">
                                        <i data-feather="shopping-bag" class="font-medium-4"></i>
                                    </div>
                                    <div>
                                        <h4 class="mb-0">{{ __('Layanan') }}</h4>
                                    </div>
                                </div>

                                <!-- frequent answer and question  collapse  -->
                                <div class="collapse-margin collapse-icon mt-2" id="faq-delivery-qna">
                                    <div class="col-lg-12 col-md-12 col-12">
                                        <div class="card card-app-design">
                                                <div class="card-body">
                                                    <p></p><h3>{{ __('Layanan') }}</h3><ul><br>
                                                        <li>Kami tidak memberi jaminan pengikut baru anda akan berinteraksi dengan anda tetapi kami akan memberi <b>garansi pada server tertentu</b> untuk pengikut yang anda beli jika dalam kurun waktu yang ditentukan berkurang</li><br>
                                                        <li>Kami tidak dapat membatalkan orderan yang sudah masuk<br>
                                                </ul>
                                                    </ul><p></p>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- cancellation return  -->
                            <div class="tab-pane" id="faq-cancellation-return" role="tabpanel" aria-labelledby="cancellation-return" aria-expanded="false">
                                <!-- icon and header -->
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-tag bg-light-primary mr-1">
                                        <i data-feather="refresh-cw" class="font-medium-4"></i>
                                    </div>
                                    <div>
                                        <h4 class="mb-0">{{ __('Pembayaran & Pengembalian') }}</h4>
                                    </div>
                                </div>

                                <!-- frequent answer and question  collapse  -->
                                <div class="collapse-margin collapse-icon mt-2" id="faq-cancellation-qna">
                                    <div class="col-lg-12 col-md-12 col-12">
                                        <div class="card card-app-design">
                                                <div class="card-body">
                                                    <p></p><h3>{{ __('Pembayaran & Pengembalian') }}</h3><ul><br>
                                                        <li><b>Tidak dapat diuangkan kembali/refund</b>.setelah sukses melakukan deposit,tidak ada cara untuk mengembalikannya lagi. Anda <b>hanya dapat menggunakan saldo untuk membeli layanan yang ada di Colecall Media </b></li><br>
                                                        <li>Anda setuju bahwa sekali Anda menyelesaikan pembayaran, Anda tidak akan mengajukan sengketa atau tagihan balik melawan kami untuk alasan apapun</li><br>
                                                        <li>uang sudah masuk tidak bisa kembalikan! hanya bisa dijadikan saldo</li><br>
                                                        <li>Jika Anda mengajukan sengketa atau tagihan terhadap kami setelah deposit, kami berhak untuk mengakhiri semua pesanan anda yang akan datang, membanned akun anda dari situs kami. Kami juga berhak untuk mengambil layanan kami yang dikirim ke akun Anda atau klien anda.</li><br>
                                                </ul>
                                                    <p></p>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- / frequently asked questions tabs pills -->

            <!-- contact us -->
            <section class="faq-contact">
                <div class="row mt-5 pt-75">
                    <div class="col-12 text-center">
                        <h2>You still have a question?</h2>
                        <p class="mb-3">
                            If you cannot find a question in our FAQ, you can always contact us. We will answer to you shortly!
                        </p>
                    </div>
                    <div class="col-sm-6">
                        <div class="card text-center faq-contact-card shadow-none py-1">
                            <div class="card-body">
                                <div class="avatar avatar-tag bg-light-primary mb-2 mx-auto">
                                    <i data-feather="phone-call" class="font-medium-3"></i>
                                </div>
                                <h4>+6282261011484</h4>
                                <span class="text-body">Whatsapp!</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card text-center faq-contact-card shadow-none py-1">
                            <div class="card-body">
                                <div class="avatar avatar-tag bg-light-primary mb-2 mx-auto">
                                    <i data-feather="mail" class="font-medium-3"></i>
                                </div>
                                <h4>colecall.media@gmail.com</h4>
                                <span class="text-body">Best way to get answer faster!</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--/ contact us -->

        </div>
<!-- END: Content-->
@endsection
