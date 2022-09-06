@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header border-0 bg-primary text-white">Visitor Details</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Visitor Type:</label>
                                    <span>{{ $visit->visitortype->name }}</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Place:</label>
                                    <span>{{ $visit->place->name }}</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Name:</label>
                                    <span>{{ $visit->full_name }}</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Address:</label>
                                    <span>{{ $visit->address }}</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Contact No:</label>
                                    <span>{{ $visit->contactno }}</span>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection
