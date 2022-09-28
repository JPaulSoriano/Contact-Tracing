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
    <form action="{{ route('guardiansstore', $student) }}" method="POST" enctype="multipart/form-data" class="w-100">
        @csrf
        <div class="card my-2">
                <div class="card-header bg-primary text-white">Guardian Information</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Last Name:</label>
                            <input type="text" name="lastname" class="form-control" placeholder="Last Name">
                        </div>
                        <div class="form-group">
                            <label>First Name:</label>
                            <input type="text" name="firstname" class="form-control" placeholder="First Name">
                        </div>
                        <div class="form-group">
                            <label>MI:</label>
                            <input type="text" name="mi" class="form-control" placeholder="M.I">
                        </div>
                        <div class="form-group">
                            <label>Address:</label>
                            <input type="text" name="address" class="form-control" placeholder="Address">
                        </div>
                        <div class="form-group">
                            <label>Email:</label>
                            <input type="text" name="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label>Contact No:</label>
                            <input type="text" name="contactno" class="form-control" placeholder="Contact No">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="image-editor">
                            <div class="cropit-preview">

                            </div>
                            <div>
                                <label class="btn btn-sm btn-primary" style="width: 350px">Select Photo
                                <input type="file" class="cropit-image-input form-control" hidden>
                                </label>
                            </div>
                            <div>
                                <input type="range" class="cropit-image-zoom-input form-control-range" style="width: 350px">
                            </div>
                            <div>
                                <input type="hidden" name="image" class="hidden-image" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
@endsection
