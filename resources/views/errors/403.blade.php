@extends('layouts.app')

@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-lg-10 text-center">
            <div class="jumbotron ">
            <h1 class="text-primary font-weight-bold text-center">FORBIDDEN</h1>
            <h5 class="text-primary font-weight-bold text-center">ERROR : 403</h5>
            <div class="text-primary font-weight-bold text-center">ERROR DESCRIPTION:</div>
            <div class="text-primary font-weight-bold text-center">"Access Denied. You Do Not Have The Permission To Access This Page On This Server"</div>
            <a href="{{ route('login') }}" class="btn btn-primary my-2 btn-block">LOGIN HERE IF YOU'RE AN AUTHORIZE PERSON</a>
            </div>
        </div>
    </div>
@endsection

