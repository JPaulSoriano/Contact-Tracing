@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-sm-12">
        @if($fetcher->verification == 1)
            <div class="text-success font-weight-bold">Verified</div>
        @else
            <div class="text-danger font-weight-bold">Unverified</div>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-sm-3 my-2">
        <div class="card">
            <div class="card-header border-0 bg-primary text-white">Student</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <label class="font-weight-bold">Grade:</label>
                        <span>{{ $fetcher->guardian->student->grade->name }}</span><br>
                        <label class="font-weight-bold">Name:</label>
                        <span>{{ $fetcher->guardian->student->full_name }}</span><br>
                        <label class="font-weight-bold">Address:</label>
                        <span>{{ $fetcher->guardian->student->address }}</span><br>
                        <img src="{{asset('storage/'.$fetcher->guardian->student->image)}}" height="200" width="200" class="img-thumbnail"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-3 my-2">
        <div class="card">
            <div class="card-header border-0 bg-primary text-white">Fetcher</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <label class="font-weight-bold">Name:</label>
                        <span>{{ $fetcher->full_name }}</span><br>
                        <label class="font-weight-bold">Address:</label>
                        <span>{{ $fetcher->address }}</span><br>
                        <label class="font-weight-bold">Contact No:</label>
                        <span>{{ $fetcher->contactno }}</span><br>
                        <label class="font-weight-bold">Email:</label>
                        <span>{{ $fetcher->email }}</span><br>
                        <img src="{{asset('storage/'.$fetcher->image)}}" height="200" width="200"  class="img-thumbnail" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-3 my-2">
        <div class="card">
            <div class="card-header border-0 bg-primary text-white">Parent</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <label class="font-weight-bold">Name:</label>
                        <span>{{ $fetcher->guardian->full_name }}</span><br>
                        <label class="font-weight-bold">Contact No:</label>
                        <span>{{ $fetcher->guardian->contactno }}</span><br>
                        <label class="font-weight-bold">Email:</label>
                        <span>{{ $fetcher->guardian->email }}</span><br>
                        <img src="{{asset('storage/'.$fetcher->guardian->image)}}" height="200" width="200"  class="img-thumbnail" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <a href="{{ route('approve', $fetcher) }}" class="btn btn-primary my-2 btn-block">APPROVE (ENTER/LEAVE)</a>
    </div>
    <div class="col-sm-6">
        <a href="{{ route('decline', $fetcher) }}" class="btn btn-danger my-2 btn-block">DECLINE (ENTER/LEAVE)</a>
    </div>
</div>
@endsection
