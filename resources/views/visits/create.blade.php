@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<div class="row justify-content-center">
    <div class="col-sm-8">
        <div class="card">
            <div class="card-header bg-primary text-white">Enter Your Infomation</div>
            <div class="card-body">
                <form action="{{ route('visits.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                        <label>Select Visitor Type</label>
                                        <select class="form-control" name="visitortype_id">
                                        @foreach ($visitortypes as $visitortype)
                                        <option value="{{ $visitortype->id }}">{{ $visitortype->name }}</option>
                                        @endforeach
                                        </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                        <label>Select Place</label>
                                        <select class="form-control" name="place_id">
                                        @foreach ($places as $place)
                                        <option value="{{ $place->id }}">{{ $place->name }}</option>
                                        @endforeach
                                        </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Lastname:</label>
                                <input type="text" name="lastname" class="form-control" placeholder="Lastname">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Firstname:</label>
                                <input type="text" name="firstname" class="form-control" placeholder="Firstname">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>MI:</label>
                                <input type="text" name="mi" class="form-control" placeholder="M.I">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Address:</label>
                                <input type="text" name="address" class="form-control" placeholder="Address">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Contact No:</label>
                                <input type="number" name="contactno" class="form-control" placeholder="Contact No">
                            </div>
                        </div>
                        <div class="col-sm-12 text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
