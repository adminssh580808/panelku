@extends('layouts.errorsNew')
@section('pageTitle','500')
@section('content')
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- Error page-->
            <div class="misc-wrapper"><a class="brand-logo" href="javascript:void(0);">
                    <h2 class="brand-text text-primary ml-1">Colecall Media</h2>
                </a>
                <div class="misc-inner p-2 p-sm-3">
                    <div class="w-100 text-center">
                        <h2 class="mb-1">Page Not Found 🕵🏻‍♀️</h2>
                        <p class="mb-2">Oops! 😖 The requested URL was not found on this server.</p><a class="btn btn-primary mb-2 btn-sm-block" href="{{ url('order/sosmed') }}">Back to home</a><img class="img-fluid" src="../../../app-assets/images/pages/error-dark.svg" alt="Error page" />
                    </div>
                </div>
            </div>
            <!-- / Error page-->
        </div>
    </div>
</div>
@endsection
