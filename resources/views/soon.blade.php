@extends('layouts.user-layouts')

@section('content')
        <div class="content-body">
            <!-- Coming soon page-->
            <div class="misc-wrapper"><a class="brand-logo" href="javascript:void(0);">
                <div class="misc-inner p-2 p-sm-3">
                    <div class="w-100 text-center">
                        <h2 class="mb-1">We are launching soon 🚀</h2>
                        <p class="mb-3">We're creating something awesome. Please subscribe to get notified when it's ready!</p>
                        <form class="form-inline justify-content-center row m-0 mb-2" action="javascript:void(0);">
                            <a href="{{ url('order/sosmed') }}" class="btn btn-primary mb-1 btn-sm-block" type="submit">Back</a>
                        </form><img class="img-fluid" src="../../../app-assets/images/pages/coming-soon-dark.svg" alt="Coming soon page" />
                    </div>
                </div>
            </div>
            <!-- / Coming soon page-->
        </div>
@endsection
