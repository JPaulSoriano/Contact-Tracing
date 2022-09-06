@extends('layouts.APP')

@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-lg-10 text-center">
            <div class="jumbotron ">
            {{-- <img src="{{ asset('images/logo.png') }}" class="img-responsive center-block d-block mx-auto my-3" style="height: 150px"> --}}
            <h1 class="text-primary font-weight-bold text-center">FORBIDDEN</h1>
            <h5 class="text-primary font-weight-bold text-center">ERROR : 403</h5>
            <div class="text-primary font-weight-bold text-center">ERROR DESCRIPTION:</div>
            <div class="text-primary font-weight-bold text-center">"Access Denied. You Do Not Have The Permission To Access This Page On This Server"</div>
            </div>
        </div>
    </div>
@endsection

