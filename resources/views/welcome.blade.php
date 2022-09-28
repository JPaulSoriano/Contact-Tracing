@extends('layouts.app')

@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-lg-8 text-center">
            <div class="jumbotron ">
            {{-- <img src="{{ asset('images/logo.png') }}" class="img-responsive center-block d-block mx-auto my-3" style="height: 150px"> --}}
            <h1 class="text-primary font-weight-bold text-center display-4">ISUdD</h1>
            <h3 class="text-primary font-weight-bold text-center">Contact Tracing</h3>
            <hr class="my-4">
            <a href="{{ route('students.create') }}" type="button" class="btn btn-lg btn-primary my-1">Proceed <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
    </div>
@endsection
