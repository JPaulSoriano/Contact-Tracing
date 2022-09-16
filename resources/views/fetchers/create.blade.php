@extends('layouts.app')

@section('content')
    @if ($message = Session::get('success'))
    <div>
        <p>{{ $message }}</p>
    </div>
    @endif
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
            <div class="card-header bg-primary text-white">Fetcher Information</div>
            <div class="card-body">
                <form action="{{ route('fetchersstore', $student) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Last Name:</label>
                                <input type="text" name="lastname" class="form-control" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>First Name:</label>
                                <input type="text" name="firstname" class="form-control" placeholder="First Name">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>MI:</label>
                                <input type="text" name="mi" class="form-control" placeholder="M.I">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Address:</label>
                                <input type="text" name="address" class="form-control" placeholder="Address">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Email:</label>
                                <input type="text" name="email" class="form-control" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Contact No:</label>
                                <input type="text" name="contactno" class="form-control" placeholder="Contact No">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Latest Picture</label>
                                <input  class="form-control" type="file" name="image">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
