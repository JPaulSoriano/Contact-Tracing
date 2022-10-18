@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center my-3">
        <div class="col-md-4">
            <p class="text-center h5 font-weight-bold">
                PRESENT THIS QR TO GUARD.
            </p>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <div class="row d-flex-justify-content-center text-center">
                        <div class="col-lg-12 font-weight-bold text-uppercase">
                            {{$fetcher->guardian->student->full_name}}
                        </div>


                        <div class="col-lg-12 my-3">
                            <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(250)
                             ->merge(public_path('images/logo.png'), 0.3, true)->errorCorrection('H')
                             ->color(0, 28, 64)
                             ->margin(3)
                             ->generate(url('/fetchers')."/".$fetcher->id."/show")); !!}">
                         </div>
                        <a href="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(250)
                            ->merge(public_path('images/logo.png'), 0.3, true)->errorCorrection('H')
                            ->color(0, 28, 64)
                            ->margin(3)
                            ->generate(url('/fetchers')."/".$fetcher->id."/show")); !!}" download>
                            Download
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
