<!DOCTYPE html>
<html class="loading dark-layout" lang="en" data-layout="dark-layout" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>{{config('web_config')['WEB_TITLE']}}</title>

    <meta name="csrf-token" content="{{csrf_token()}}">

    <meta content="{{ config('web_config')['WEB_DESCRIPTION'] }}" name="description" />
    <link rel="apple-touch-icon" href="{{asset('app-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ config("web_config")["WEB_FAVICON_URL"] }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/charts/apexcharts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/extensions/toastr.min.css')}}">
    <!-- END: Vendor CSS-->

     {{-- AUTH LAYOUTS --}}
     <link rel="stylesheet" type="text/css" href="{{ asset('asset-landing/cdn.mypanel.link/fsvxaw/lyth66f81hjbnd6r.css') }}">


    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/swiper.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/extensions/ext-component-swiper.css') }}">


    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/themes/dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/themes/bordered-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/themes/semi-dark-layout.css')}}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/menu/menu-types/horizontal-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/dashboard-ecommerce.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/charts/chart-apex.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/extensions/ext-component-toastr.css')}}">
    <!-- END: Page CSS-->

    {{-- SCROLL CHAT --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/horizontal-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/app-chat-list.css') }}">
    <!-- END-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu  navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-lg navbar navbar-fixed align-items-center navbar-shadow navbar-brand-center" data-nav="brand-center">
        <div class="navbar-header d-xl-block d-none">
            <ul class="nav navbar-nav">
                <li class="nav-item"><a class="navbar-brand" href="{{ url('/') }}"><span class="brand-logo">
                    <img src="{{config('web_config')['WEB_LOGO_URL']}}" height="32" alt="logo" id="logo-top"></span>
                    <h2 class="brand-text mb-0">Colecall Media</h2>
                    </a></li>
            </ul>
        </div>
        <div class="navbar-container d-flex content">
            <div class="bookmark-wrapper d-flex align-items-center">
                <ul class="nav navbar-nav d-xl-none">
                    <li class="nav-item"><a class="nav-link menu-toggle" href="javascript:void(0);"><i class="ficon" data-feather="menu"></i></a></li>
                </ul>
            </div>
            <ul class="nav navbar-nav align-items-center ml-auto">
                <li class="nav-item d-none d-lg-block"><a class="nav-link" href="{{ url('/ticket') }}" data-toggle="tooltip" data-placement="top" title="Chat"><i class="ficon" data-feather="message-square"></i></a></li>

                <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="user-nav d-sm-flex d-none"><span class="user-name font-weight-bolder">{{auth()->user()->name}}</span><span class="user-status">{{ convert(auth()->user()->balance) }}</span></div><span class="avatar"><img class="round" src="{{asset('app-assets//images/portrait/small/avatar-s-11.jpg')}}" alt="avatar" height="40" width="40"><span class="avatar-status-online"></span></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
                        <a class="dropdown-item" href="{{url('users/settings')}}"><i class="mr-50" data-feather="user"></i> Profile</a>
                        <a class="dropdown-item" href="{{ url('/ticket') }}"><i class="mr-50" data-feather="mail"></i> Ticket</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="mr-50" data-feather="power"></i> Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                              @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <ul class="main-search-list-defaultlist d-none">
        <li class="d-flex align-items-center"><a href="javascript:void(0);">
                <h6 class="section-label mt-75 mb-0">Files</h6>
            </a></li>
        <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100" href="app-file-manager.html">
                <div class="d-flex">
                    <div class="mr-75"><img src="{{asset('app-assets/images/icons/xls.png')}}" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Two new item submitted</p><small class="text-muted">Marketing Manager</small>
                    </div>
                </div><small class="search-data-size mr-50 text-muted">&apos;17kb</small>
            </a></li>
        <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100" href="app-file-manager.html">
                <div class="d-flex">
                    <div class="mr-75"><img src="{{asset('app-assets/images/icons/jpg.png')}}" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">52 JPG file Generated</p><small class="text-muted">FontEnd Developer</small>
                    </div>
                </div><small class="search-data-size mr-50 text-muted">&apos;11kb</small>
            </a></li>
        <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100" href="app-file-manager.html">
                <div class="d-flex">
                    <div class="mr-75"><img src="{{asset('app-assets/images/icons/pdf.png')}}" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">25 PDF File Uploaded</p><small class="text-muted">Digital Marketing Manager</small>
                    </div>
                </div><small class="search-data-size mr-50 text-muted">&apos;150kb</small>
            </a></li>
        <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100" href="app-file-manager.html">
                <div class="d-flex">
                    <div class="mr-75"><img src="{{asset('app-assets/images/icons/doc.png')}}" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Anna_Strong.doc</p><small class="text-muted">Web Designer</small>
                    </div>
                </div><small class="search-data-size mr-50 text-muted">&apos;256kb</small>
            </a></li>
        <li class="d-flex align-items-center"><a href="javascript:void(0);">
                <h6 class="section-label mt-75 mb-0">Members</h6>
            </a></li>
        <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="app-user-view.html">
                <div class="d-flex align-items-center">
                    <div class="avatar mr-75"><img src="{{asset('app-assets/images/portrait/small/avatar-s-8.jpg')}}" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">John Doe</p><small class="text-muted">UI designer</small>
                    </div>
                </div>
            </a></li>
        <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="app-user-view.html">
                <div class="d-flex align-items-center">
                    <div class="avatar mr-75"><img src="{{asset('app-assets/images/portrait/small/avatar-s-1.jpg')}}" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Michal Clark</p><small class="text-muted">FontEnd Developer</small>
                    </div>
                </div>
            </a></li>
        <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="app-user-view.html">
                <div class="d-flex align-items-center">
                    <div class="avatar mr-75"><img src="{{asset('app-assets/images/portrait/small/avatar-s-14.jpg')}}" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Milena Gibson</p><small class="text-muted">Digital Marketing Manager</small>
                    </div>
                </div>
            </a></li>
        <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="app-user-view.html">
                <div class="d-flex align-items-center">
                    <div class="avatar mr-75"><img src="{{asset('app-assets/images/portrait/small/avatar-s-6.jpg')}}" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Anna Strong</p><small class="text-muted">Web Designer</small>
                    </div>
                </div>
            </a></li>
    </ul>
    <ul class="main-search-list-defaultlist-other-list d-none">
        <li class="auto-suggestion justify-content-between"><a class="d-flex align-items-center justify-content-between w-100 py-50">
                <div class="d-flex justify-content-start"><span class="mr-75" data-feather="alert-circle"></span><span>No results found.</span></div>
            </a></li>
    </ul>
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <div class="horizontal-menu-wrapper">
        <div class="header-navbar navbar-expand-sm navbar navbar-horizontal floating-nav navbar-dark navbar-shadow menu-border container-xxl" role="navigation" data-menu="menu-wrapper" data-menu-type="floating-nav">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mr-auto"><a class="navbar-brand" href="{{asset('html/ltr/horizontal-menu-template-dark/index.html')}}"><span class="brand-logo">
                                <svg viewbox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="24">
                                    <defs>
                                        <lineargradient id="linearGradient-1" x1="100%" y1="10.5120544%" x2="50%" y2="89.4879456%">
                                            <stop stop-color="#000000" offset="0%"></stop>
                                            <stop stop-color="#FFFFFF" offset="100%"></stop>
                                        </lineargradient>
                                        <lineargradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%" x2="37.373316%" y2="100%">
                                            <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                                            <stop stop-color="#FFFFFF" offset="100%"></stop>
                                        </lineargradient>
                                    </defs>
                                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <g id="Artboard" transform="translate(-400.000000, -178.000000)">
                                            <g id="Group" transform="translate(400.000000, 178.000000)">
                                                <path class="text-primary" id="Path" d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z" style="fill:currentColor"></path>
                                                <path id="Path1" d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z" fill="url(#linearGradient-1)" opacity="0.2"></path>
                                                <polygon id="Path-2" fill="#000000" opacity="0.049999997" points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325"></polygon>
                                                <polygon id="Path-21" fill="#000000" opacity="0.099999994" points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338"></polygon>
                                                <polygon id="Path-3" fill="url(#linearGradient-2)" opacity="0.099999994" points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288"></polygon>
                                            </g>
                                        </g>
                                    </g>
                                </svg></span>
                            <h2 class="brand-text mb-0">Colecall Media</h2>
                        </a></li>
                    <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i></a></li>
                </ul>
            </div>
            <div class="shadow-bottom"></div>
            <div class="navbar-container main-menu-content" data-menu="menu-container">
                <!-- include ../../../includes/mixins-->
                <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
                    @if(Auth::user()->level == 'Developer')
                    <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link d-flex align-items-center" href="index.html" data-toggle="dropdown"><i data-feather="home"></i><span data-i18n="Dashboards">Dashboards</span></a>
                        <ul class="dropdown-menu">
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="{{ url('/developer') }}" data-toggle="dropdown" data-i18n="Analytics"><i data-feather="home"></i><span data-i18n="Analytics">Developer</span></a>
                            </li>
                            <li class="active" data-menu=""><a class="dropdown-item d-flex align-items-center" href="{{ url('/home') }}" data-toggle="dropdown" data-i18n="eCommerce"><i data-feather="home"></i><span data-i18n="eCommerce">Member</span></a>
                            </li>
                        </ul>
                    </li>
                    @else
                    <li class="nav-item" data-menu="dropdown"><a class="nav-link d-flex align-items-center" href="{{route('order_sosmed')}}"  data-toggle=""><i data-feather='home'></i><span data-i18n="Misc">Dashboard</span></a></li>
                    @endif
                    @if(Auth::user()->level != 'Member')
                    <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link d-flex align-items-center" href="#" data-toggle="dropdown"><i data-feather='shield'></i><span data-i18n="Apps">Staff Menu</span></a>
                        <ul class="dropdown-menu">
                            @if(Auth::user()->level == 'Admin' || Auth::user()->level == 'Developer')
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="{{url('staff/ticket')}}" data-toggle="dropdown" data-i18n="Email"><i data-feather='circle'></i></i><span data-i18n="Email">Kelola Tiket</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="{{url('staff/deposit')}}" data-toggle="dropdown" data-i18n="Chat"><i data-feather="circle"></i><span data-i18n="Chat">Kelola Deposit</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="{{url('staff/orders/sosmed')}}" data-toggle="dropdown" data-i18n="Todo"><i data-feather="circle"></i><span data-i18n="Todo">Kelola Pesanan Sosmed</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="{{url('staff/orders/pulsa')}}" data-toggle="dropdown" data-i18n="Calendar"><i data-feather="circle"></i><span data-i18n="Calendar">Kelola Pesanan Pulsa</span></a>
                            </li>
                            @endif
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="{{url('staff/add_user')}}" data-toggle="dropdown" data-i18n="Kanban"><i data-feather="circle"></i><span data-i18n="Kanban">Tambah User</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="{{url('staff/voucher')}}" data-toggle="dropdown" data-i18n="Kanban"><i data-feather="circle"></i><span data-i18n="Kanban">Kode Voucher</span></a>
                            </li>
                        </ul>
                    </li>
                    @endif
                    <li class="nav-item"><a class="nav-link d-flex align-items-center" href="{{route('order_sosmed')}}" data-toggle=""><i data-feather='shopping-cart'></i><span data-i18n="Misc">{{ __('Pesanan Baru') }}</span></a></li>
                    <li class="nav-item"><a class="nav-link d-flex align-items-center" href="{{route('sosmed_history')}}" data-toggle=""><i data-feather='truck'></i><span data-i18n="Misc">{{ __('Riwayat Pesanan') }}</span></a></li>
                    <li class="nav-item"><a class="nav-link d-flex align-items-center" href="{{ url('price/sosmed') }}" data-toggle=""><i data-feather='list'></i><span data-i18n="Misc">{{ __('Daftar Layanan') }}</span></a></li>
                    <li class="nav-item"><a class="nav-link d-flex align-items-center" href="{{url('deposit/new')}}" data-toggle=""><i data-feather='credit-card'></i><span data-i18n="Misc">{{ __('Deposit') }}</span></a></li>
                    <!--<li class="nav-item"><a class="nav-link d-flex align-items-center" href="{{ url('ticket') }}" data-toggle=""><i class="ficon" data-feather="message-square"></i><span data-i18n="Misc">{{ __('Support') }}</span></a></li>-->
                    <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link d-flex align-items-center" href="#" data-toggle="dropdown"><i class="ficon" data-feather="message-square"></i><span data-i18n="Charts &amp; Maps">{{ __('Support') }}</span></a>
                        <ul class="dropdown-menu">
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="{{ url('ticket') }}" data-toggle="dropdown" data-i18n="Colors"><i data-feather="circle"></i><span data-i18n="Colors">Ticket</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="https://wa.me/+6282261011484?text=Hallo%20Colecall%20Media%20Bisa%20Bantu%20Saya?" data-toggle="dropdown" data-i18n="Colors"><i data-feather="circle"></i><span data-i18n="Colors">Whatsapp</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="https://t.me/OwnColecallMedia" data-toggle="dropdown" data-i18n="Colors"><i data-feather="circle"></i><span data-i18n="Colors">Telegram</span></a>
                            </li>
                        </ul>
                    </li>
                    {{-- <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link d-flex align-items-center" href="#" data-toggle="dropdown"><i class="ficon" data-feather="shopping-cart"></i><span data-i18n="User Interface">Pesanan</span></a>
                        <ul class="dropdown-menu">
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="{{route('order_sosmed')}}" data-toggle="dropdown" data-i18n="Typography"><i class="ficon" data-feather="circle"></i><span data-i18n="Typography">Pesanan Baru</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="{{route('order_sosmed_mass')}}" data-toggle="dropdown" data-i18n="Colors"><i data-feather="circle"></i><span data-i18n="Colors">Pesan Massal</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="{{route('sosmed_history')}}" data-toggle="dropdown" data-i18n="Feather"><i data-feather="circle"></i><span data-i18n="Feather">Riwayat Pesanan</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="{{route('sosmed_tos')}}" data-toggle="dropdown" data-i18n="Feather"><i data-feather="circle"></i><span data-i18n="Feather">Ketentuan</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link d-flex align-items-center" href="#" data-toggle="dropdown"><i data-feather='credit-card'></i><span data-i18n="Forms &amp; Tables">Deposit</span></a>
                        <ul class="dropdown-menu">
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="{{url('deposit/new')}}" data-toggle="dropdown" data-i18n="Typography"><i class="ficon" data-feather="circle"></i><span data-i18n="Typography">Deposit Baru</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="{{url('deposit/history')}}" data-toggle="dropdown" data-i18n="Colors"><i data-feather="circle"></i><span data-i18n="Colors">Riwayat Deposit</span></a>
                            </li>
                        </ul>
                    </li> --}}

                    <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link d-flex align-items-center" href="#" data-toggle="dropdown"><i data-feather='code'></i><span data-i18n="Charts &amp; Maps">API</span></a>
                        <ul class="dropdown-menu">
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="{{ url('api/profile/doc') }}" data-toggle="dropdown" data-i18n="Colors"><i data-feather="circle"></i><span data-i18n="Colors">Profile</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="{{url('api/sosmed/doc')}}" data-toggle="dropdown" data-i18n="Colors"><i data-feather="circle"></i><span data-i18n="Colors">Sosmed</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link d-flex align-items-center" href="#" data-toggle="dropdown"><i class="ficon" data-feather="box"></i><span data-i18n="User Interface">{{ __('Lainnya') }}</span></a>
                        <ul class="dropdown-menu">
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="{{url('hall_of_fame')}}" data-toggle="dropdown" data-i18n="Colors"><i data-feather="circle"></i><span data-i18n="Colors">Top 10</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="{{url('activity')}}" data-toggle="dropdown" data-i18n="Feather"><i data-feather="circle"></i><span data-i18n="Feather">{{ __('Riwayat Aktifitas') }}</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="{{url('balance_usage')}}" data-toggle="dropdown" data-i18n="Feather"><i data-feather="circle"></i><span data-i18n="Feather">{{ __('Penggunaan Saldo') }}</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="{{url('voucher')}}" data-toggle="dropdown" data-i18n="Feather"><i data-feather="circle"></i><span data-i18n="Feather">{{ __('Kode Voucher') }}</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="{{url('soon')}}" data-toggle="dropdown" data-i18n="Colors"><i data-feather="circle"></i><span data-i18n="Colors">Request Service (SOON)</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="{{url('soon')}}" data-toggle="dropdown" data-i18n="Colors"><i data-feather="circle"></i><span data-i18n="Colors">{{ __('Sewa Panel') }} (SOON)</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="{{url('terms')}}" data-toggle="dropdown" data-i18n="Colors"><i data-feather="circle"></i><span data-i18n="Colors">{{ __('Terms') }}</span></a>
                            </li>
                        </ul>
                    </li>
                    {{-- <li class="nav-item" data-menu="dropdown"><a class="nav-link d-flex align-items-center" href="{{ url('price/pulsa') }}" data-toggle=""><i data-feather='list'></i><span data-i18n="Misc">Daftar Layanan</span></a></li> --}}
                </ul>
            </div>
        </div>
    </div>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Dashboard Ecommerce Starts -->
                <section>
                    @yield('content')
                    <div class="col-12">
                        <div class="offcanvas offcanvas-end text-bg-dark" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                            <div class="offcanvas-header mt-1">
                                <h3 class="offcanvas-title" id="offcanvasRightLabel">Berita Terbaru</h3>
                                <button type="button" class="btn-close bg-light" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <hr class="text-bg-light">
                            <div class="offcanvas-body">
                            @foreach ($news as $item)
                                <div class="toast show toast-wrapper toast-translucent" role="alert" aria-live="assertive" aria-atomic="true">
                                    <div class="toast-header text-light">
                                        <img src="{{config('web_config')['WEB_LOGO_URL']}}" class="mr-1 mb-1 mt-1" alt="Toast image" height="25" width="25" />
                                        <strong class="mr-auto mt-1  mb-1">{{ $item->title }}</strong>
                                        <small class="text-muted mt-1  mb-1">{{ date('d F Y H:i', strtotime($item->created_at)) }}</small>
                                    </div>
                                    <div class="toast-body text-light">{!! nl2br(htmlentities($item->content)) !!}</div>
                                </div>
                                @endforeach
                            </div>
                    
                        </div>
                    </div>
                </section>
                <!-- Dashboard Ecommerce ends -->

            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
    <div class="position-fixed">
        <button class="btn btn-info btn-sm position-fixed mb-1 mr-1 bottom-0 end-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i data-feather="bell"></i> Berita</button>
    </div>
    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light footer-shadow">
        <p class="clearfix mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2021 COLECALL MEDIA</a><span class="d-none d-sm-inline-block">, All rights Reserved</span></span><span class="float-md-right d-none d-md-block">Hand-crafted & Made with<i data-feather="heart"></i></span></p>
    </footer>



    <!-- END: Footer-->



    <!-- BEGIN: Vendor JS-->
    @include('sweet::alert')
    <script src="{{asset('app-assets/vendors/js/vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{asset('app-assets/vendors/js/ui/jquery.sticky.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/charts/apexcharts.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/extensions/toastr.min.js')}}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{asset('app-assets/js/core/app-menu.js')}}"></script>
    <script src="{{asset('app-assets/js/core/app.js')}}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{asset('app-assets/js/scripts/pages/dashboard-ecommerce.js')}}"></script>
    <!-- END: Page JS-->
    {{-- SWIPER --}}
    <script src="{{ asset('app-assets/vendors/js/extensions/swiper.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/extensions/ext-component-swiper.js') }}"></script>

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('app-assets/js/scripts/cards/card-advance.js') }}"></script>
    <!-- END: Page JS-->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>

    {{-- OLD --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/modernizr.min.js')}}"></script>
    <script src="{{asset('js/detect.js')}}"></script>
    <script src="{{asset('js/fastclick.js')}}"></script>
    <script src="{{asset('js/jquery.slimscroll.js')}}"></script>
    <script src="{{asset('js/jquery.blockUI.js')}}"></script>
    <script src="{{asset('js/waves.js')}}"></script>
    <script src="{{asset('js/jquery.nicescroll.js')}}"></script>
    <script src="{{asset('js/jquery.scrollTo.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/sweetalert.min.js')}}"></script>
    <script src="{{asset('plugins/alertify/js/alertify.js')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>
    @include('sweet::alert')
    <script type="text/javascript">
            @if(session('display_news') == 1)
                $('#exampleModal').modal('show')
            @endif
    </script>
        <!-- App js -->
    <script type="text/javascript">
            $(document).ready(function(){
                var csrf_token = $("meta[name='csrf-token']").attr('content');
                var mq = window.matchMedia( "(max-width: 576px)" );
                if (mq.matches) {
                    $('#logo-top').attr('src', $("span").attr('data-favicon'))
                }



                $('#btn-read').click(function(){
                    $.ajax({
                        url: "/read_news",
                        method: 'POST',
                        data: {
                          "_token": '{{ csrf_token() }}',
                          "read": true
                        }
                    });
                })
          })
    </script>
    <script src="{{asset('js/custom.js')}}"></script>
    @stack('scripts')

</body>
<!-- END: Body-->

</html>
